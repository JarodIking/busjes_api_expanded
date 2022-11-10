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
        Schema::create('inventory_order', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('inventory_id');
            $table->foreignUuid('order_id');
            $table->timestamps();

            //foreign key assignments
            $table->foreign('order_id')->references('id')->on('order');
            $table->foreign('inventory_id')->references('id')->on('inventory');

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
        Schema::dropIfExists('inventory_order');
        Schema::enableForeignKeyConstraints();
    }
};
