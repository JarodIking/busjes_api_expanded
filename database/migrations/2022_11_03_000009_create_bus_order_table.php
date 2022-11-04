<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('bus_id');
            $table->double('fuel_amount');
            $table->double('days');
            $table->double('total_price');

            $table->timestamps();

            //foreign key assignments
            $table->foreign('order_id')->references('id')->on('order');
            $table->foreign('bus_id')->references('id')->on('bus');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('bus_orders');
        Schema::enableForeignKeyConstraints();
    }
};
