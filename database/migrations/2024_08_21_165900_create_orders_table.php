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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id'); //int(220) unsigned
            $table->string('name', 100);
            $table->string('email', 100)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('address', 200)->nullable();
            $table->tinyInteger('status', false)->default(1)->nullable();
            $table->unsignedInteger('customer_id');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
