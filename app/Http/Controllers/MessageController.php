<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\MessageRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        // Mark messages as read
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

}