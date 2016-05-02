<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersBillingaddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_billingaddress', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('company')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street');
            $table->bigInteger('postalcode');
            $table->string('city');
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->integer('country_id')->nullable();
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
        Schema::drop('users_billingaddress');
    }
}
