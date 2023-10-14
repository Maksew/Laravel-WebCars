<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('agency');
            $table->dropColumn('region');
            $table->dropColumn('handling_rating');  // Supprimer cette ligne si vous voulez garder cette colonne
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('agency');
            $table->string('region');
            $table->unsignedTinyInteger('handling_rating');  // Supprimer cette ligne si vous voulez garder cette colonne
        });
    }

};
