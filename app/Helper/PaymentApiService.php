<?php


namespace App\Helper;


use GuzzleHttp\Client;

class PaymentApiService
{
     function payment($from){
        $json=[
            'apikey'=>'87S86K61M9W11G27R25G99W30O96X23F87D79N85G',
            'country'=>$from['country'],
            'action'=>'Fundraising',
            'carrier'=>$from['carrier'],
            'number'=>$from['phone'],
            'amount'=>$from['amount']
        ];
        logger(json_encode($json));
        $options=[
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'body' => json_encode($json)
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('POST', 'https://digitwave-services.com/api/add');
       //return json_decode($res->getBody(),true);
         return $this->cURL('https://digitwave-services.com/api/add',$json);
    }
     function getPayID($from){
        $json=[
            'apikey'=>'87S86K61M9W11G27R25G99W30O96X23F87D79N85G',
            'transactionId'=>$from['transactionId'],
        ];
        logger($json);
        $options=[
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'body' => json_encode($json)
        ];
        $client = new Client(['headers' => $options]);
       // $res = $client->request('POST', 'https://digitwave-services.com/api/getwithid');
       return $this->cURL('https://digitwave-services.com/api/getwithid',$json);
       // return json_decode($res->getBody(),true);
    }
    protected function cURL($url, $json)
    {

        // Create curl resource
        $ch = curl_init($url);

        // Request headers
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Bearer '.env("FLUTTER_SECRET_KEY"),
        );

        // Return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $output contains the output string
        $output = curl_exec($ch);


        // Close curl resource to free up system resources
        curl_close($ch);
        return json_decode($output,true);
    }
}
