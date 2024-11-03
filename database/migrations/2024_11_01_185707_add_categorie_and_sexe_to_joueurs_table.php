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
        Schema::table('joueurs', function (Blueprint $table) {
            //
            $table->string('categorie')->after('email'); // Positionnez le champ où vous le souhaitez
            $table->string('sexe', 10)->after('categorie'); // Limitez le sexe à 10 caractères
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('joueurs', function (Blueprint $table) {
            //
            $table->dropColumn(['categorie', 'sexe']);
        });
    }
};
