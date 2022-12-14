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


        Schema::create('sales', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->id('id');
            $table->string('invoice_number')->default('INV');
            $table->string('product_name');
            $table->foreign('product_name')->references('product_name')->on('product');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer');
        //    $table->string('customer_name');
        //    $table->foreign('customer_name')->references('customer_name')->on('customer');

            //$table->decimal('price',5,2);
           // $table->foreign('price')->references('price')->on('product');
            $table->integer('sales_qty');
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
        Schema::dropIfExists('sales');
    }
};
