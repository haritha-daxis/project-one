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
        Schema::create('product', function (Blueprint $table) {
            $table->id('id');
            // $table->foreign('id')->references('id')->on('category');
           $table->string('category_id');
             // $table->foreign('id','category_id')->references('id','category_id')->on('category');
             $table->foreign('category_id')->references('category_id')->on('category');
              $table->string('product_name')->unique();
              $table->decimal('price',5,2);

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
        Schema::dropIfExists('product');
    }
};
