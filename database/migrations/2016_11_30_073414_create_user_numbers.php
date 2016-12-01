<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whats_accounts', function (Blueprint $table) {
            $table->string('login');
            $table->primary('login');

            $table->integer('user_id');

            $table->string('type');
            $table->string('pw');
            $table->string('expiration');
            $table->string('kind');
            $table->string('price');
            $table->string('cost');
            $table->string('currency');
            $table->string('price_expiration');

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
        Schema::drop('whats_accounts');
    }
}
