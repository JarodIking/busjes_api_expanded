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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('inventory_id')->nullable();
            $table->string("username", 50);
            $table->string("password", 300)->unique();

            $table->string('api_token', 80)
                ->unique()
                ->nullable()
                ->default(null);

            $table->string("firstname", 50);
            $table->string("lastname", 50);
            $table->string("email", 100);
            $table->foreignUuid('country_id')->nullable();
            $table->string("province", 50);
            $table->string("city", 50);
            $table->string("street", 50);
            $table->integer("housenumber");
            $table->string("zipcode", 10);

            $table->timestamps();

            //foreign key assignments
            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
};
