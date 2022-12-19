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
        Schema::create('servicereqprod', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceoffered_id')->constrained('serviceoffered');
            $table->char('product_ian', 13);

            $table->foreign('product_ian')->references('ian')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicereqprod');
    }
};
