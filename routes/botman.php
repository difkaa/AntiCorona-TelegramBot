<?php

use App\Conversations\FaqDefinisiConversation;
use App\Conversations\FaqGejalaConversation;
use App\Conversations\FaqHotlineConversation;
use App\Conversations\FaqMencegahuConversation;
use App\Conversations\MenuConversation;
use App\Http\Controllers\BotManController;
use App\Conversations\OnboardingUserConversation;
use App\Http\Controllers\InfoDuniaController;
use App\Http\Controllers\InfoIndonesiaController;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Middleware\Dialogflow;

$botman = resolve('botman');
$dialogflow = Dialogflow::create(env('DIALOGFLOW_TOKEN'))->listenForAction();
$botman->middleware->received($dialogflow);

// $botman->hears('Hi', function ($bot) {
//     $bot->reply('Hello!');
// });
// $botman->hears('tesa', function($bot){
//     $bot->reply('Iya!');
// });
$botman->hears('Start conversation', BotManController::class.'@startConversation');
$botman->hears('/start', function(BotMan $bot){
    $bot->startConversation(new OnboardingUserConversation);
});

$botman->hears('menu', function(Botman $bot){
    $bot->startConversation(new MenuConversation);
});

$botman->hears('Info Indonesia', InfoIndonesiaController::class.'@startConversation');
$botman->hears('Info Dunia', InfoDuniaController::class.'@startConversation');

// $botman->hears('faq.definisi', function(BotMan $bot){
//     $bot->reply('FAQ definisi ditrigger');
// })->middleware($dialogflow);

// $botman->hears('input.welcome', function(BotMan $bot){
//     $bot->reply('Hai saya bot Corona(Covid-19), Ayo kita saling menjaga diri jangan berpergian #StayAtHome');
// })->middleware($dialogflow);

$botman->group(['middleware' => $dialogflow], function(Botman $bot){
    $bot->hears('faq.definisi', function(Botman $bot){
        $bot->startConversation(new FaqDefinisiConversation);
    });

    $bot->hears('input.welcome', function(BotMan $bot){
        $bot->reply('Hai saya bot Corona(Covid-19), Ayo kita saling menjaga diri jangan berpergian #StayAtHome');
    });

    $bot->hears('faq.hotline', function(Botman $bot){
        $bot->startConversation(new FaqHotlineConversation);
    });

    $bot->hears('faq.gejala', function(BotMan $bot){
        $bot->startConversation(new FaqGejalaConversation);
    });

    $bot->hears('faq.mencegah', function(BotMan $bot){
        $bot->startConversation(new FaqMencegahuConversation);
    });
});

$botman->fallback(function($bot) {
    $bot->reply('Maaf Bot tidak memahami pertanyaan anda. Untuk informasi mengenai bot ini ketikkan <b>Menu</b>',['parse_mode' => 'HTML']);
});
