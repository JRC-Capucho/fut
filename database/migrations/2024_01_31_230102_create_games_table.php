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
        Schema::create('games', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('day');
            $table->time('start');
            $table->time('end');
            $table->unsignedInteger("home_team_scoreboard")->default(0);
            $table->unsignedInteger("away_team_scoreboard")->default(0);
            $table->string('winner')->nullable()->default(NULL);
            $table->foreignUuid('home_team')->constrained('teams');
            $table->foreignUuid('away_team')->constrained('teams');
            $table->foreignUuid('league')->constrained('leagues');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
