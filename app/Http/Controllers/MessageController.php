<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\MessageRepository;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    protected $messageRepository;
    protected $userRepository;

    public function __construct(MessageRepository $messageRepository,UserRepository $userRepository) {
        $this->messageRepository = $messageRepository;
        $this->userRepository = $userRepository;
    }


    public function getConversation($userId){
        $user = Auth::user();
        $otherUser = $this->userRepository->find($userId);
        
        if (!$otherUser) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $messages = $this->messageRepository->getConversation($user->id, $userId);
        
        foreach ($messages as $message) {
            if ($message->receiver_id === $user->id && !$message->is_read) {
                $this->messageRepository->update($message->id, ['is_read' => true]);
            }
        }

        return response()->json([
            'messages' => $messages,
            'other_user' => [
                'id' => $otherUser->id,
                'name' => $otherUser->name,
                'profile_image' => $otherUser->profile_image
            ]
        ]);
    }

    public function sendMessage(Request $request){
        
        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();
        
        if ($user->id === (int)$request->receiver_id) {
            return response()->json(['message' => 'Cannot send message to yourself'], 400);
        }

        $message = $this->messageRepository->create([
            'sender_id' => $user->id,
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
            'is_read' => false,
        ]);

        return response()->json([
            'message' => 'Message sent successfully',
            'data' => $message
        ], 201);
    }
    
    public function getConversationList(){
        $user = Auth::user();
        $conversations = [];
        $userIds = [];
        
        $sentMessages = $user->sentMessages;
        $receivedMessages = $user->receivedMessages;
        
        foreach ($sentMessages as $message) {
            if (!in_array($message->receiver_id, $userIds)) {
                $userIds[] = $message->receiver_id;
            }
        }
        
        foreach ($receivedMessages as $message) {
            if (!in_array($message->sender_id, $userIds)) {
                $userIds[] = $message->sender_id;
            }
        }
        
        foreach ($userIds as $userId) {
            $otherUser = $this->userRepository->find($userId);
            $messages = $this->messageRepository->getConversation($user->id, $userId);
            
            if (count($messages) > 0) {
                $lastMessage = $messages->sortByDesc('created_at')->first();
                $unreadCount = $messages->where('receiver_id', $user->id)->where('is_read', false)->count();
                
                $conversations[] = [
                    'user' => [
                        'id' => $otherUser->id,
                        'name' => $otherUser->name,
                        'profile_image' => $otherUser->profile_image
                    ],
                    'last_message' => [
                        'content' => $lastMessage->content,
                        'created_at' => $lastMessage->created_at,
                        'is_from_me' => $lastMessage->sender_id === $user->id
                    ],
                    'unread_count' => $unreadCount
                ];
            }
        }
        
        usort($conversations, function($a, $b) {
            return strtotime($b['last_message']['created_at']) - strtotime($a['last_message']['created_at']);
        });
        
        return response()->json(['conversations' => $conversations]);
    }

    public function getUnreadCount(){
        $user = Auth::user();
        $unreadMessages = $this->messageRepository->getUnreadMessages($user->id);
        
        return response()->json([
            'unread_count' => count($unreadMessages)
        ]);
    }
}