<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $guarded = [];

    public function scopeSubscribeUser($query, string $driver, $botmanUser)
    {
        $query->updateOrCreate(['chat_id' => $botmanUser->getId()],[
            'driver' => $driver,
            'chat_id' => $botmanUser->getId(),
            'first_name' => $botmanUser->getFirstName()
        ]);
    }

    public function scopeUnsubscribeUser($query, string $chatId)
    {
        $subscriber = $query->where('chat_id', $chatId);
        if($subscriber){
            $subscriber->delete();
        }
    }
}
