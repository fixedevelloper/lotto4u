<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->integer('fixture_id');
            $table->string('referee');
            $table->string('timezone');
            $table->string('timestamp');
            $table->string('date');
            $table->string('st_long');//status
            $table->string('st_short');
            $table->string('st_elapsed');
            $table->integer('league_id');
            $table->integer('league_season');
            $table->string('league_round');
            $table->string('team_home_name')->nullable();
            $table->string('team_home_logo')->nullable();
            $table->string('team_away_name')->nullable();
            $table->string('team_away_logo')->nullable();
            $table->integer('team_home_id');
            $table->integer('team_away_id');
            $table->boolean('team_away_winner')->default(false);
            $table->boolean('team_home_winner')->default(false);
            $table->integer('goal_home')->nullable();
            $table->integer('goal_away')->nullable();
            $table->integer('score_ht_home')->nullable();
            $table->integer('score_ht_away')->nullable();
            $table->integer('score_ft_home')->nullable();
            $table->integer('score_ft_away')->nullable();
            $table->integer('score_ext_home')->nullable();
            $table->integer('score_ext_away')->nullable();
            $table->integer('score_pt_home')->nullable();//score penalty
            $table->integer('score_pt_away')->nullable();
            $table->string('day_timestamp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};
