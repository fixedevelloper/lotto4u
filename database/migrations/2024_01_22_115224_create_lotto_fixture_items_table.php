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
        Schema::create('lotto_fixture_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("lotto_fixture_id")->constrained("lotto_fixtures");
            $table->string("fixture_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotto_fixture_items');
    }
};
