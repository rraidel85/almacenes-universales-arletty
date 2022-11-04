<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToRecepcionCiegaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recepcin_ciega', function (Blueprint $table) {
            $table->unsignedBigInteger ('proveedor_id');

            $table->foreign('proveedor_id')
                ->references('id')
                ->on('proveedores')
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
        Schema::table('recepcion_ciega', function (Blueprint $table) {
            //
        });
    }
}
