<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id')->nullable();
            $table->integer('leasing_id')->nullable();
            $table->string('state');
            $table->text('damage')->nullable();
            $table->float('kilometrage');
            $table->integer('gasoline')->nullable();
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
        Schema::dropIfExists('carbacks');
    }
}
