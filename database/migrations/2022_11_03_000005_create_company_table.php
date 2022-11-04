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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50);
            $table->unsignedBigInteger('country_id');
            $table->string('province', 50);
            $table->string("city", 50);
            $table->string("street", 50);
            $table->integer("housenumber");
            $table->string("zipcode", 6);
            $table->timestamps();

            //foreign key assignments
            $table->foreign('country_id')->references('id')->on('country');
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
        Schema::dropIfExists('company');
        Schema::enableForeignKeyConstraints();
    }
};
