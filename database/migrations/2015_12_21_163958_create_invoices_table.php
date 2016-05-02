<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('number')->unique();

            $table->boolean('payed')->default(false);
            $table->integer('tax_id')->nullable();
            $table->decimal('amount', 13, 2);
            $table->decimal('balance', 13, 2);
            $table->text('notes')->nullable();

            $table->date('invoice_due');
            $table->date('payed_at');
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
        Schema::drop('invoices');
    }
}
