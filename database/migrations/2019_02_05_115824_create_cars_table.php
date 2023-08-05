<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mark');
            $table->integer('cartype_id');
            $table->integer('carmodel_id');
            $table->integer('carstate_id');
            $table->integer('category_id');
            $table->string('color');
            $table->string('registration');
            $table->boolean('available');
            $table->boolean('active');
            $table->float('amount');
            $table->text('description')->nullable();
            $table->integer('place')->nullable();
            $table->integer('baggage')->nullable();
            $table->integer('door')->nullable();
            $table->float('kilometrage');
            $table->string('fuel');
            $table->integer('gasoline');
            $table->text('damage')->nullable();
            $table->float('amount_hour')->nullable();
            $table->string('year')->nullable();
            $table->float('lome_accra')->nullable();
            $table->float('lome_cotonou')->nullable();
            $table->float('bail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
