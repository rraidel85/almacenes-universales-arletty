<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Area
 * @package App\Models
 * @version October 18, 2022, 2:05 pm UTC
 *
 * @property string $nombre
 */
class Area extends Model
{


    public $table = 'areas';
    



    public $fillable = [
        'nombre',
        'descripcion',
        'almacenes_id'
       
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string',
        'id' => 'integer',
        'almacenes_id' => 'integer'
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
        
        
    ];

    //area tiene muchos productos

    public function stock_producto()
    {
      return $this->hasMany(StockProducto::class, 'stock_producto_id');
    }

    //area pertenece a un almacen
    public function almacenes()
  {
      return $this->belongsTo(Almacen::class);
 }
    
}
