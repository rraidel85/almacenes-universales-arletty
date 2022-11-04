<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});















Route::resource('recursos', App\Http\Controllers\API\RecursoAPIController::class);


Route::resource('cultivos', App\Http\Controllers\API\CultivoAPIController::class);


Route::resource('animals', App\Http\Controllers\API\AnimalAPIController::class);


Route::resource('maquinarias', App\Http\Controllers\API\MaquinariaAPIController::class);


Route::resource('trabajadors', App\Http\Controllers\API\TrabajadorAPIController::class);


Route::resource('ventas', App\Http\Controllers\API\VentaAPIController::class);


Route::resource('animal__tipos', App\Http\Controllers\API\Animal_TipoAPIController::class);


Route::resource('bajas', App\Http\Controllers\API\BajaAPIController::class);


Route::resource('zonas', App\Http\Controllers\API\ZonaAPIController::class);


Route::resource('proveedors', App\Http\Controllers\API\ProveedorAPIController::class);


Route::resource('recepción__ciegas', App\Http\Controllers\API\Recepción_CiegaAPIController::class);


Route::resource('productos', App\Http\Controllers\API\ProductoAPIController::class);


Route::resource('almacens', App\Http\Controllers\API\AlmacenAPIController::class);


Route::resource('areas', App\Http\Controllers\API\AreaAPIController::class);


Route::resource('unidad__medidas', App\Http\Controllers\API\Unidad_MedidaAPIController::class);


Route::resource('stock_productos', App\Http\Controllers\API\StockProductoAPIController::class);


Route::resource('recepcion_ciegas', App\Http\Controllers\API\RecepcionCiegaAPIController::class);


Route::resource('clientes', App\Http\Controllers\API\ClienteAPIController::class);


Route::resource('ofertas', App\Http\Controllers\API\OfertaAPIController::class);


Route::resource('facturas', App\Http\Controllers\API\FacturaAPIController::class);
