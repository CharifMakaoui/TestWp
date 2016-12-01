<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table){

            $table->integer('id',true);

            $table->integer('user_id'); // User Parent

            $table->string('country_code');

            $table->string('phone_number');
            $table->unique('phone_number');

            $table->string('client_name');
            $table->timestamps();

            $table->foreign('user_id','foreign_userID_on_client')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
