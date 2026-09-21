<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tournament_match_id')
                  ->constrained('tournament_matches')
                  ->onDelete('cascade');

            $table->integer('team_a_score')->default(0);
            $table->integer('team_b_score')->default(0);

            $table->foreignId('winner_team_id')
                  ->nullable()
                  ->constrained('teams')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};