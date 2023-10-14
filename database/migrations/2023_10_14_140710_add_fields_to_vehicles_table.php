<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToVehiclesTable extends Migration
{
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('year');
            $table->string('category');
            $table->string('energy');
            $table->string('transmission');
            $table->string('agency');
            $table->decimal('price', 8, 2);
            $table->unsignedInteger('kilometrage');
            $table->string('region');
            $table->unsignedTinyInteger('engine_rating');
            $table->unsignedTinyInteger('chassis_rating');
            $table->unsignedTinyInteger('handling_rating');
            $table->unsignedTinyInteger('visual_rating');
            $table->unsignedTinyInteger('general_rating');
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            // Liste des colonnes à supprimer
            $table->dropColumn(['year', 'category', 'energy', 'transmission', 'agency', 'price', 'kilometrage', 'region', 'engine_rating', 'chassis_rating', 'handling_rating', 'visual_rating', 'general_rating', 'description']);
        });
    }
}
