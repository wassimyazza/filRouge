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

}