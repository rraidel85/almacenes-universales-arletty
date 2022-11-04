<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToStockProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_producto', function (Blueprint $table) {
            $table->unsignedBigInteger ('producto_id');

            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->unsignedBigInteger ('recepcin_ciega_id');

            $table->foreign('recepcin_ciega_id')
                ->references('id')
                ->on('recepcin_ciega')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

                $table->unsignedBigInteger ('areas_id');

                $table->foreign('areas_id')
                    ->references('id')
                    ->on('areas')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_producto', function (Blueprint $table) {
            //
        });
    }
}
