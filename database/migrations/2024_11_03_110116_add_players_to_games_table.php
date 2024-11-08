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
        Schema::table('games', function (Blueprint $table) {
            //
            $table->string('player1')->after('name'); // Ajoute la colonne player1
            $table->string('player2')->after('player1'); // Ajoute la colonne player2
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            //
            $table->dropColumn(['player1', 'player2']);
        });
    }
};
