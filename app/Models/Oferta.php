<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Oferta
 * @package App\Models
 * @version October 27, 2022, 10:10 pm UTC
 *
 * @property string $fecha
 * @property boolean $facturado
 */
class Oferta extends Model
{


    public $table = 'ofertas';
    



    public $fillable = [
        'fecha',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha' => 'date',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha'=>'required|date',
        'stocks' => 'required|array'
    ];

    public function stock_producto()
    {
        return $this->belongsToMany(StockProducto::class, 
        'stock_producto_oferta', 'oferta_id', 'stock_producto_id');
   }
    
   public function factura()
    {
        return $this->hasOne(Factura::class);
   }

}
