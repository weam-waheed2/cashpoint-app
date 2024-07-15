<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->unique();
            $table->enum('user_type',['admin', 'user'])->default('user');
            $table->string('points')->nullable();
            $table->string('balance')->nullable();
            $table->enum('type',['free', 'paid'])->default('free');
            $table->date('date_subscription')->nullable();
            $table->date('date_expiry')->nullable();
            $table->date('date_register')->nullable();
            $table->string('ip')->nullable();
            $table->enum('status',['active', 'deactive'])->default('deactive');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
