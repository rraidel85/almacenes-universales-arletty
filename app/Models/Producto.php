<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Producto
 * @package App\Models
 * @version October 18, 2022, 2:01 pm UTC
 *
 * @property string $nombre
 * @property string $codigo
 */
class Producto extends Model
{


    public $table = 'productos';
    



    public $fillable = [
        'nombre',
        'codigo',
        'descripcion',
        'unidad_medida_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'codigo' => 'string',
        'descripcion' => 'string',
        'id' => 'integer',
        'unidad_medida_id'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
        'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        'codigo' => 'required|integer',
        'descripcion'=> 'required|regex:/^[\pL\s\-]+$/u',
        

    ];
    //Prodcuto solo tiene una Unidad de Medida
    //relacion de uno a mucho

    public function unidad_medida()
    {
        return $this->belongsTo(Unidad_Medida::class, 'unidad_medida_id');
   }


     //Producto está en muchos Stock_Productos
     //relacion de uno a muchos
     public function stock_producto()
     {
       return $this->hasMany(StockProducto::class, 'stock_producto_id');
     }

}

    
    

