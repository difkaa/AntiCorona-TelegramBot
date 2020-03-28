<?php

namespace App\Http\Controllers;

use App\Conversations\FaqInfoIndonesiaConversation;
use App\Util;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;

class InfoIndonesiaController extends Controller
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
        $data = $this->messages();
        $this->botman->reply("Informasi COVID-19 di Indonesia : \n<b>Positif: </b>".$data->positif."\n<b>Sembuh: </b>".$data->sembuh."\n<b>Meninggal: </b>".$data->meninggal."",['parse_mode' => 'HTML']);
        $this->botman->ask('Ketikkan Provinsi untuk melihat informasi lebih lanjut. Contoh: Jawa Tengah atau ketikkan end jika ingin mengakhiri', function($answer, $bot) {

            $result = null;
            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://api.kawalcorona.com/indonesia/provinsi');
            $response = $request->getBody();
            $data     = json_decode($response);
            foreach($data as $dt){
                if($dt->attributes->Provinsi == ucwords($answer->getText())){
                    $result = $dt->attributes;
                }
            }
            if($answer->getText() == 'end' || $answer->getText() == 'End'){
                $bot->say('Oke terima kasih. Untuk kembali ke menu ketikkan <b>menu</b> ',['parse_mode' => 'HTML']);
            }
            elseif($result){
                $bot->say("Untuk Informasi ".ucwords($answer->getText()).":\n<b>Positif: </b>".$result->Kasus_Posi."\n<b>Sembuh: </b>".$result->Kasus_Semb."\n<b>Meninggal: </b>".$result->Kasus_Meni."",['parse_mode' => 'HTML']);
                $bot->repeat();
            }else{
                $bot->say('Provinsi '.ucwords($answer->getText()).' yang anda inputkan tidak ditemukan, silahkan tulis lengkap provinsi');
                $bot->repeat();
            }
        });
        // $bot->startConversation(new FaqInfoIndonesiaConversation($data));
    }

    protected function messages(){
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://api.kawalcorona.com/indonesia');
        $response = $request->getBody();
        $data     = json_decode($response);
        return $data[0];
    }

    public function cekProvinsi()
    {
        $a = 'jawa tengah';
        $x=$this->dataProvinsi($a);
        return $x->Provinsi;
    }
}
