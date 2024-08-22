<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\League;
use App\Models\LeagueSeason;
use App\Models\Team;
use App\Services\FootballAPIService;
use Illuminate\Console\Command;

class CreateLeague extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-league';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $this->createCountry();
        $this->createLeagues();

    }

    function createLeagues()
    {
        $res = FootballAPIService::getLeagues();
        $data = $res->response;
        for ($i = 0; $i < sizeof($data); $i++) {
            logger('****'.$i);
            $league = League::query()->firstWhere(['league_id' => $data[$i]->league->id]);
            if (is_null($league)) {
                $league = new League();
            }
            $league->name = $data[$i]->league->name;
            $league->league_id = $data[$i]->league->id;
            $league->type = $data[$i]->league->type;
            $league->logo = $data[$i]->league->logo;
           // $league->country_code = $data[$i]->country->code;
            $league->save();
        }

    }

    function createCountry()
    {
        $res = FootballAPIService::getCountries();
        $data = $res->response;
        for ($i = 0; $i < sizeof($data); $i++) {
            $country = Country::query()->firstWhere(['name' => $data[$i]->name]);
            if (is_null($country)) {
                $country = new Country();
                $country->country_id = $data[$i]->name;
            }
            $country->name = $data[$i]->name;
            $country->code = $data[$i]->code;
            $country->flag = $data[$i]->flag;
            $country->save();
        }

    }
}
