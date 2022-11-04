<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockProductoOfertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_producto_oferta', function (Blueprint $table) {
            $table->id();
            

            $table->unsignedBigInteger ('stock_producto_id');

            $table->foreign('stock_producto_id')
                ->references('id')
                ->on('stock_producto')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->unsignedBigInteger ('oferta_id');

            $table->foreign('oferta_id')
                ->references('id')
                ->on('ofertas')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            
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
        Schema::dropIfExists('stock_producto_oferta');
    }
}
