<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    if (Auth::check()) {

        return view('home');
    }

    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::group(['middleware' => 'auth'], static function () {


    Route::get('/ventas/pdf', [
        App\Http\Controllers\VentaController::class,
        'pdf'
    ])->name('ventas.pdf');


});

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');


Route::resource('ventas', App\Http\Controllers\VentaController::class);

Route::resource('roles', App\Http\Controllers\RolController::class);

Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('proveedors', App\Http\Controllers\ProveedorController::class);


Route::resource('recepciónCiegas', App\Http\Controllers\Recepción_CiegaController::class);


Route::resource('productos', App\Http\Controllers\ProductoController::class);


Route::resource('almacens', App\Http\Controllers\AlmacenController::class);


Route::resource('areas', App\Http\Controllers\AreaController::class);


Route::resource('unidadMedidas', App\Http\Controllers\Unidad_MedidaController::class);


Route::resource('stockProductos', App\Http\Controllers\StockProductoController::class);


Route::resource('stockProductos', App\Http\Controllers\StockProductoController::class);


Route::resource('recepcionCiegas', App\Http\Controllers\RecepcionCiegaController::class);


Route::resource('clientes', App\Http\Controllers\ClienteController::class);


Route::resource('unidadMedidas', App\Http\Controllers\Unidad_MedidaController::class);


Route::resource('ofertas', App\Http\Controllers\OfertaController::class);


Route::resource('facturas', App\Http\Controllers\FacturaController::class);
