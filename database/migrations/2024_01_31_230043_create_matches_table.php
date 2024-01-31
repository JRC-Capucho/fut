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
        Schema::create('matches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('day');
            $table->time('start', 2);
            $table->time('end', 2);
            $table->string("scoreboard")->nullable();
            $table->foreignUuid('winner')->nullable();
            $table->foreignUuid('home_team');
            $table->foreignUuid('away_team');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
