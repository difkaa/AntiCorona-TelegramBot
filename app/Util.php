<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Util extends Model
{
    public function dataProvinsi($provinsi)
    {
        $result = null;
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://api.kawalcorona.com/indonesia/provinsi');
        $response = $request->getBody();
        $data     = json_decode($response);

        foreach($data as $dt){
            if($dt->attributes->Provinsi == $provinsi){
                $result = $dt->attributes;
            }
        }
        return $result;
    }
}
