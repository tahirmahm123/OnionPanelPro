<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVPNUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vpn_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->dateTime('expiryDate')->nullable();
            $table->boolean('isActive');
            $table->enum('platform',['OnionVPN','AnyConnect']);
            $table->string('phone');
            $table->integer('days');
            $table->string('createdBy');
            $table->string('updatedBy');
            $table->string('paymentStatus')->default('Not Paid');
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
        Schema::dropIfExists('vpn_users');
    }
}
