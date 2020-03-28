<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class MenuConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say("Kami anti Corona memiliki informasi menu, ketikkan keyword dibawah untuk mendapatkan info:\n- Corona/Covid-19\n- Gejala/tanda-tanda\n- Mencegah/Melindungi diri\n- Info Dunia\n- Info Indonesia\n- Hotline");
    }
}
