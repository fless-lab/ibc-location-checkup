<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id')->nullable();
            $table->integer('leasing_id')->nullable();
            $table->float('driver_amount');
            $table->float('reduction_amount');
            $table->float('tva_amount');
            $table->float('amount');
            $table->float('ttc_amount');
            $table->float('bail_amount');
            $table->float('total_amount');
            $table->timestamp('date_start');
            $table->timestamp('date_back')->default(\DB::raw('CURRENT_TIMESTAMP'))
            ;
            $table->string('mode');
            $table->text('receipt')->nullable();
            $table->string('numfac');
            $table->integer('payment_id')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
