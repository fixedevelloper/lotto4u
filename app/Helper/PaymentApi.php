<?php


namespace App\Helper;


use GuzzleHttp\Client;

class PaymentApi
{
    static function payment($from){
        $json=[
            'apikey'=>'87S86K61M9W11G27R25G99W30O96X23F87D79N85G',
            'country'=>$from['country'],
            'action'=>'Fundraising',
            'carrier'=>$from['carrier'],
            'number'=>$from['phone'],
            'amount'=>$from['amount']
        ];
        $options=[
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'body' => json_encode($json)
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('POST', 'https://digitwave-services.com/api/add');
        return json_decode($res->getBody(),true);
    }
}
