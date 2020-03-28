<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class FaqHotlineConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say("Informasi resmi dari pemerintah atau hotline Covid-19 Sebagai berikut: \nwww.covid19.go.id \n0811 333 99 000 \nHotline 119 ext 9 untuk mendapatkan bantuan apabila ada gejala");

    }
}
