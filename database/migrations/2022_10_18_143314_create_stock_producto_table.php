<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockProductoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_producto', function (Blueprint $table) {
            $table->integer('cantidad');
            $table->double('precio_compra');
            $table->dateTime('fecha_entrada');
            $table->dateTime('feha_produccion');
            $table->dateTime('fecha_vencimiento');
            $table->id();
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
        Schema::drop('stock_producto');
    }
}
