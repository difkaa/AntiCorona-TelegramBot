<?php

namespace App\Conversations;

use App\Subscriber;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class OnboardingUserConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->welcomeUser();
    }

    private function welcomeUser(){
        $this->say('Selamat datang, saya adalah bot anti Corona!');
        $this->say('Saya bisa memberikan informasi tentang Corona, kamu bisa tanya tentang Apa itu Corona, Penyebaran Corona, Gejala Corona, dan Cara mencegah Corona!');
        $this->askUserToSubscribe();
    }

    private function askUserToSubscribe()
    {
        $question = Question::create('Saya akan mengirimkan informasi terupdate, untuk melakukan hal itu saya perlu menyimpan data kamu, apakah kamu bersedia?')
            ->addButtons([
                Button::create('Ya, Saya bersedia')->value('yes'),
                Button::create('Tidak, tidak sekarang')->value('no'),
            ]);

        $this->ask($question, function(Answer $answer){
            switch ($answer->getText()) {
                case 'yes':
                    Subscriber::subscribeUser(
                        $this->bot->getDriver()->getName(),
                        $this->bot->getUser(),
                    );
                    $this->say('Terima kasih, saya akan memberikan informasi update dan penting lainnya.');
                    return $this->say('Ketik <b>menu</b> untuk info lebih lanjut',['parse_mode' => 'HTML']);
                case 'no':
                    Subscriber::unsubscribeUser($this->bot->getUser()->getId());
                    $this->say('Oke, Tidak masalah. Terima Kasih.');
                    return $this->say('Ketik <b>menu</b> untuk info lebih lanjut',['parse_mode' => 'HTML']);
                default:
                    $this->say('Saya tidak paham maksudmu, bisa diulangi ?');
                    // $this->repeat();
            }
        });
    }
}
