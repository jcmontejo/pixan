<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('products', function(Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('category');
                $table->text('description');
                $table->integer('stock');
                $table->dateTime('deadline');
                $table->decimal('price');
                $table->string('filename')->default('default.png');

                $table->timestamps();
                $table->softDeletes();
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }

}
