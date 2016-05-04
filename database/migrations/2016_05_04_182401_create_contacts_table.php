<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_organisation')->default(false);
            $table->string('salution')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('organisation')->nullable();
            $table->string('position')->nullable();
            $table->integer('contact_type_id');
            $table->integer('contacts_billing_address_id')->nullable();
            $table->timestamps();
        });

        Schema::create('contacts_billing_address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street');
            $table->string('postalcode');
            $table->string('city');
            $table->integer('contact_id');
            $table->integer('country_id');
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
        Schema::drop('contacts');
        Schema::drop('contacts_billing_address');
    }
}
