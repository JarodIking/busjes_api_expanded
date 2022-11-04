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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_id');
            $table->string("username", 50);
            $table->string("password", 300)->unique();

            $table->string('api_token', 80)
                ->unique()
                ->nullable()
                ->default(null);

            $table->string("firstname", 50);
            $table->string("lastname", 50);
            $table->string("email", 100);
            $table->unsignedBigInteger('country_id');
            $table->string("province", 50);
            $table->string("city", 50);
            $table->string("street", 50);
            $table->integer("housenumber");
            $table->string("zipcode", 6);

            $table->timestamps();

            //foreign key assignments
            $table->foreign('country_id')->references('id')->on('country');
            $table->foreign( "inventory_id")->references("id")->on("inventory");
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
        Schema::dropIfExists('user');
        Schema::enableForeignKeyConstraints();
    }
};
