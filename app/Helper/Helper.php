<?php


namespace App\Helper;


use App\Models\Fixture;
use App\Models\GamePlay;
use App\Models\LottoFixtureItem;
use App\Models\PlayingFixture;
use Illuminate\Support\Facades\Mail;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use Mailjet\Resources;

class Helper
{
    static function calculAmountWinner($cagnote,$players,$totalfixture){
        $amount_winners=[];
        $amount_x_x=$cagnote*0.5;
        $amount_x_1=$cagnote*0.2;
        $amount_x_2=$cagnote*0.1;
        $winner_x_x= array_filter($players,function ($iten) use ($totalfixture) {
            $res=false;
            $value= $totalfixture- $iten["count"];
            if ($value==0){
                $res= true;
            }
            return $res;
        });
        $winner_1_x= array_filter($players,function ($iten) use ($totalfixture) {
            $res=false;
            $value= $totalfixture- $iten["count"];
            if ($value==1){
                $res= true;
            }
            return $res;
        });
        $winner_x_2= array_filter($players,function ($iten) use ($totalfixture) {
            $res=false;
            $value= $totalfixture- $iten["count"];
            if ($value==2){
                $res= true;
            }
            return $res;
        });
        foreach ($winner_x_x as $wi){
            $amount_winners[]=[
                "game_id" => $wi["game_id"],
                "user" => $wi["user"],
                "address" => $wi["address"],
                "count" => $wi["count"],
                "amount"=>$amount_x_x/sizeof($winner_x_x)
            ];
        }
        foreach ($winner_1_x as $wi){
            $amount_winners[]=[
                "game_id" => $wi["game_id"],
                "user" => $wi["user"],
                "address" => $wi["address"],
                "count" => $wi["count"],
                "amount"=>$amount_x_1/sizeof($winner_1_x)
            ];
        }
        foreach ($winner_x_2 as $wi){
            $amount_winners[]=[
                "game_id" => $wi["game_id"],
                "user" => $wi["user"],
                "address" => $wi["address"],
                "count" => $wi["count"],
                "amount"=>$amount_x_2/sizeof($winner_x_2)
            ];
        }

        return $amount_winners;
    }
    static function calculSoldeGrille($lotto_fixture_id){
        $games=GamePlay::query()->where(['lotto_fixture_id'=>$lotto_fixture_id])->count();
        return $games*env("PRICE_GAME");

    }
    static function getFixture($fixture_id)
    {
        $fixture=Fixture::query()->firstWhere(['fixture_id'=>$fixture_id]);

        return $fixture;
    }
    static function getLottofixtureItem($fixture_id)
    {
        $fixtures=LottoFixtureItem::query()->where(['lotto_fixture_id'=>$fixture_id])->get();
        return $fixtures;
    }
    static function getOccurenceToPlay($loto_fixture_item_id)
    {
        $fixtures=PlayingFixture::query()->where(['loto_fixture_item_id'=>$loto_fixture_item_id])->get();
        $v1=0;
        $v2=0;
        $v3=0;
        foreach ($fixtures as $fixture){
            switch ($fixture->value){
                case 1:
                    $v1+=1;
                    break;
                case 2:
                    $v2+=1;
                    break;
                case 3:
                    $v3+=1;
                    break;
            }
        }
        return [
            'v1'=>$v1,
            'v2'=>$v2,
            'v3'=>$v3,
        ];
    }
    static function getPlayingItem($game_id,$fixture_item_id)
    {
        $play=PlayingFixture::query()->firstWhere(['game_play_id'=>$game_id,'loto_fixture_item_id'=>$fixture_item_id]);
        return $play;
    }
    public static function send_contact($data)
    {
        //logger(env('MAIL_FROM_ADDRESS'));
        $data_ = array('email' => $data['email'],
            'name' => $data['name'],'subject' => 'contact form','data' => $data['message']);
        Mail::send(['html' => 'mails.contact'], $data_, function ($message)
        use ($data) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $message->to($data['email'], $data['name'])->subject("Contact form");
                  });

    }
    public static function mailajet($data){
        $mj = Mailjet::getClient();

        $body = [
            'FromEmail' => 'contact@guens-education.com',
            'FromName' => env('MAIL_FROM_NAME'),
            'Subject' => "contact form",
            'MJ-TemplateID' => 6207309,
            'MJ-TemplateLanguage' => true,
            'Vars' => json_decode(json_encode($data), true),
            'Recipients' => [['Email' => $data['email'],'infos@guens-education.com']]
        ];

        $response = $mj->post(Resources::$Email, ['body' => $body]);

        if($response->success()){
          return 1;
    } else {
        return 0;
    }
    }
}
