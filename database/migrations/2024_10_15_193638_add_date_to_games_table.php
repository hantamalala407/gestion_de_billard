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
            //t@ voalohany
            //$table->timestamp('date')->nullable(); // ou $table->date('date')->nullable();

            $table->id();
            $table->timestamp('date'); // Assure-toi d'avoir cette colonne
            // Ajoute d'autres colonnes si nécessaire
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            //
        });
    }
};
