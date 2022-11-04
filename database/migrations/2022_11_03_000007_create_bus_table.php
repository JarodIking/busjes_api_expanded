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
        Schema::create('bus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string("name", 30);
            $table->string("model", 50);
            $table->double("fuel_capacity");
            $table->double("storage_capacity");
            $table->unsignedBigInteger('fueltype_id');
            $table->double("buy-in_price");
            $table->timestamps();

            //foreign key assignments
            $table->foreign('company_id')->references('id')->on('company');
            $table->foreign('fueltype_id')->references('id')->on('fueltype');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus');
    }
};
