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
        Schema::create('orderedservice', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained('order');
            $table->foreignId('serviceoffered_id')->constrained('serviceoffered');
            $table->date('contract_end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderedservice');
    }
};
