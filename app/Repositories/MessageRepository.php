<?php

namespace App\Repositories;

use App\Models\Message;

class MessageRepository extends BaseRepository{

    public function __construct(Message $model){
        parent::__construct($model);
    }

    public function getConversation($userId1, $userId2){
        return $this->model->where(function ($query) use ($userId1, $userId2) {
            $query->where('sender_id', $userId1)->where('receiver_id', $userId2);
        })->orWhere(function ($query) use ($userId1, $userId2) {
            $query->where('sender_id', $userId2)
                  ->where('receiver_id', $userId1);
        })->orderBy('created_at', 'asc')->get();
    }

    public function getUnreadMessages($userId){
        return $this->model->where('receiver_id', $userId)->where('is_read', false)->get();
    }

}