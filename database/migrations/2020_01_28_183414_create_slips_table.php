<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->dateTime('dateOnSlip');
            $table->integer('amount')->nullable();
            $table->integer('currencyType')->nullable();
            $table->string('slipPath');
            $table->string('status')->default('pending')->index();
            $table->string('uploadedBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slips');
    }
}
