<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoDuniaController extends Controller
{
     /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->botman = app('botman');
    }

    public function startConversation(){
        $dataPositif = $this->globalPositif();
        $dataSembuh = $this->globalSembuh();
        $dataMeninggal = $this->globalMeninggal();

        $this->botman->reply("Informasi COVID-19 di Dunia : \n<b>Data Positif: </b>".$dataPositif->value."\n<b>Data Sembuh: </b>".$dataSembuh->value."\n<b>Data Meninggal: </b>".$dataMeninggal->value."",['parse_mode' => 'HTML']);
        // $bot->startConversation(new FaqInfoIndonesiaConversation($data));
    }

    protected function globalSembuh(){
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://api.kawalcorona.com/sembuh');
        $response = $request->getBody();
        $data     = json_decode($response);
        return $data;
    }

    protected function globalPositif(){
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://api.kawalcorona.com/positif');
        $response = $request->getBody();
        $data     = json_decode($response);
        return $data;
    }

    protected function globalMeninggal(){
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://api.kawalcorona.com/meninggal');
        $response = $request->getBody();
        $data     = json_decode($response);
        return $data;
    }
}
