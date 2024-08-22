<?php


namespace App\Helper;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class FootballAPIService
{

    /**
     * @throws GuzzleException
     */
    static function getLeagues(){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/leagues');
        return json_decode($res->getBody());
    }

    /**
     * @param $league
     * @param $season
     * @return mixed
     * @throws GuzzleException
     */
    static function getTeams($league,$season){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/teams',
            ['query' => [ 'league' => $league,'season'=>$season]]);
        return json_decode($res->getBody());
    }
    /**
     * @throws GuzzleException
     */
    static function getCountries(){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/countries');
        return json_decode($res->getBody());
    }

    /**
     * @param $from
     * @param $to
     * @return mixed
     * @throws GuzzleException
     */
    static function getAllFixturesBetweenDate($from){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/fixtures',
            ['query' => ["date"=> $from]]);
        return json_decode($res->getBody());
    }
    static function getAllFixturesBetweenDateWithLeague($league,$from,$to){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/fixtures',
            ['query' => [ "league"=> $league,'season' => '2023', "from"=> $from,'to' => $to]]);
        return json_decode($res->getBody());
    }
    static function getAllFixturesBetweenDateAndBookmekerPage($from){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/odds',
            ['query' => ["date"=> $from,'bookmaker' => 11,'bet'=>5]]);
        return json_decode($res->getBody());
    }
    static function getAllFixturesBetweenDateAndBookmekerAllBetPage($from,$page){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/odds',
            ['query' => ["date"=> $from,'bookmaker' => 11,'bet'=>1,'page'=>$page]]);
        return json_decode($res->getBody());
    }
    static function getAllFixturesBetweenDateAndBookmeker($from,$page){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/odds',
            ['query' => ["date"=> $from,'bookmaker' => 11,'bet'=>5,'page'=>$page]]);
        return json_decode($res->getBody());
    }
    static function getAllFixturesDateAndBookmekerBet10($from,$page){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/odds',
            ['query' => ["date"=> $from,'bookmaker' => 11,'bet'=>10,'page'=>$page]]);
        return json_decode($res->getBody());
    }
    static function getAllFixturesHtoH($home,$away){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/fixtures/headtohead',
            ['query' => ["h2h"=> $home.'-'.$away,"last"=>5]]);
        return json_decode($res->getBody());
    }
    static function getStatdings($league_id,$season){
        $options=[
            'x-rapidapi-host' => 'api-football-v1.p.rapidapi.com',
            'x-rapidapi-key' => env("APIFOOT_KEY")
        ];
        $client = new Client(['headers' => $options]);
        $res = $client->request('GET', env("APIFOOT_KEY_URL").'/standings',
            ['query' => [ 'league' => $league_id,'season'=>$season]]);
        return json_decode($res->getBody());
    }
}
