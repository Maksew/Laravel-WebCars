<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}

