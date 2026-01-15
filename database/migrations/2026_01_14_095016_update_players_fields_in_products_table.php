<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Renombrar players a max_players
            $table->renameColumn('players', 'max_players');

            // Añadir min_players
            $table->integer('min_players')->default(2)->after('max_players');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Volver atrás
            $table->renameColumn('max_players', 'players');
            $table->dropColumn('min_players');
        });
    }
};
