<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class FaqGejalaConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say("Gejala Covid-19 ini pada umumnya berupa:\n- Demam 38°C\n- Batuk kering\n- Sesak nafas\nNah, kalau kamu habis berpergian dan 14 hari kemudian mengalami gejala ini, segera ke Rumah Sakit rujukan untuk memeriksakan diri kamu lebih menyeluruh. Oh ya, saat ke Rumah Sakit, jangan menggunakan transportasi umum ya.\n~COVID19.GO.ID");
    }
}
