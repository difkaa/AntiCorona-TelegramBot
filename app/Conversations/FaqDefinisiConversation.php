<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class FaqDefinisiConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say('<b>Coronavirus</b> itu merupakan keluarga besar virus yang dapat menyerang manusia dan hewan. Nah, pada manusia, biasanya menyebabkan penyakit infeksi saluran pernafasan, mulai dari flu biasa hingga penyakit serius, seperti MERS dan SARS. Covid-19 sendiri merupakan coronavirus jenis baru yang ditemukan pada manusia di daerah Wuhan, Provinsi Hubei, China pada tahun 2019. Maka dari itu, Coronavirus jenis baru ini diberi nama Coronavirus Disease-2019 yang disingkat menjadi Covid-19. ~COVID19.GO.ID', ['parse_mode' => 'HTML']);
    }
}
