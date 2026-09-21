<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tournament_matches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tournament_id')
                  ->constrained('tournaments')
                  ->onDelete('cascade');

            $table->foreignId('team_a_id')
                  ->constrained('teams')
                  ->onDelete('cascade');

            $table->foreignId('team_b_id')
                  ->constrained('teams')
                  ->onDelete('cascade');

            $table->date('match_date');
            $table->time('match_time')->nullable();
            $table->string('venue')->nullable();

            $table->enum('status', [
                'scheduled',
                'completed',
                'cancelled'
            ])->default('scheduled');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tournament_matches');
    }
};