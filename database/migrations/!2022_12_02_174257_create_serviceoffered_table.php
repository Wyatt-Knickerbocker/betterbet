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
        Schema::create('serviceoffered', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('service');
            $table->foreignId('users_id')->constrained();
            $table->integer('speed');
            $table->integer('data_cap');
            $table->integer('contract_length');
            $table->float('contract_penalty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serviceoffered');
    }
};
