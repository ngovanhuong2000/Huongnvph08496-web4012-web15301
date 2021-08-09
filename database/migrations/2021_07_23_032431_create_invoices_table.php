<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('user_id');
            // $table->bigInteger('staff_id');
            $table->string('number');
            $table->string('address');
            $table->unsignedDouble('total_price');
            $table->integer('status')->default(config('common.invoice.status.cho_duyet'));
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('staff_id')->references('id')->on('users');


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
