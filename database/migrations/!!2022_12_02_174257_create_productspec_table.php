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
        Schema::create('productspec', function (Blueprint $table) {
            $table->char('product_ian',13);
            $table->foreignId('specification_id')->constrained('specification');
            $table->string('value');

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
        Schema::dropIfExists('productspec');
    }
};
