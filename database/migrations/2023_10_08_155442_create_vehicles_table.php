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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('category');
            $table->string('energy');
            $table->string('transmission');
            $table->string('agency');
            $table->decimal('price', 8, 2);
            $table->decimal('kilometrage', 8, 2);
            $table->string('region');
            $table->integer('engine_rating');
            $table->integer('chassis_rating');
            $table->integer('handling_rating');
            $table->integer('visual_rating');
            $table->integer('general_rating');
            $table->text('description')->nullable();
            // ... vous n'ajouterez pas de colonne pour vehicle_images ici car cela nécessitera probablement une autre table.
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
