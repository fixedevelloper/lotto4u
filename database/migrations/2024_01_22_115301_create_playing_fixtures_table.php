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
        Schema::create('playing_fixtures', function (Blueprint $table) {
            $table->id();
            $table->foreignId("game_play_id")->constrained('game_plays');
            $table->foreignId("loto_fixture_item_id")->constrained('lotto_fixture_items');
            $table->string("value")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playing_fixtures');
    }
};
