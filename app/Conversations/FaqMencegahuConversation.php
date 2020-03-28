<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class FaqMencegahuConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        // $this->say("Yang dapat kamu lakukan dalam <b>melindungi diri</b> sendiri adalah dengan cara:\n- Rajin-rajin cuci tangan dengan sabun! Jangan lupa! Sebelum makan, setelah dari toilet, setelah memegang binatang, atau setelah berpergian.\n- Ketika batuk atau bersin jangan lupa untuk menutup mulut dan hidung kamu, ya. Pakai tissue, saputangan, atau lipatan siku.\n- Hindari kontak dekat dengan orang yang menunjukkan gejala Covid-19\n- Hindari kerumunan\n- Jangan lupa untuk jaga jarak lebih dari 1 meter  antar kamu dan orang-orang di sekitarmu (social distancing)");
        $this->say("Yang dapat kamu lakukan dalam <b>melindungi diri</b> sendiri adalah dengan cara:\n- Rajin-rajin cuci tangan dengan sabun! Jangan lupa! Sebelum makan, setelah dari toilet, setelah memegang binatang, atau setelah berpergian.\n- Ketika batuk atau bersin jangan lupa untuk menutup mulut dan hidung kamu, ya. Pakai tissue, saputangan, atau lipatan siku.\n- Hindari kontak dekat dengan orang yang menunjukkan gejala Covid-19\n- Hindari kerumunan\n- Jangan lupa untuk jaga jarak lebih dari 1 meter  antar kamu dan orang-orang di sekitarmu (social distancing)\n\n<b>Pemakaian masker</b> sebenarnya hanya untuk mereka yang sedang batuk-batuk atau bersin. Penggunaan masker juga dikhususkan bagi petugas yang merawat Covid-19 ataupun orang-orang terdekat yang merawat orang bergejala Covid-19. Bagi kamu yang masih merasa khawatir dan <b>tidak memiliki masker</b>, alternatif yang dapat kamu lakukan adalah dengan menggunakan kain. Jangan lupa untuk selalu mencuci kain yang dijadikan masker.",['parse_mode' => 'HTML']);
        $this->say('<a href="https://kawalcovid19.id/content/563/panduan-naik-ojek-motor-mobil-untuk-pengemudi-dan-penumpang">Untuk panduan naik ojek online</a>',['parse_mode' => 'HTML']);
    }
}
