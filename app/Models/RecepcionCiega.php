<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class RecepcionCiega
 * @package App\Models
 * @version October 18, 2022, 2:41 pm UTC
 *
 * @property string $factura
 * @property string $transportador
 */
class RecepcionCiega extends Model
{


    public $table = 'recepcin_ciega';
    



    public $fillable = [
        'numerofactura',
        'nombretransportador',
        'matriculacamion',
        'proveedor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'numerofactura' => 'integer',
        'nombretransportador' => 'string',
        'matriculacamion'=> 'string',
        'id' => 'integer',
        'proveedor_id'=> 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numerofactura' => 'required|integer',
        'nombretransportador'=> 'required|regex:/^[\pL\s\-]+$/u',
        'matriculacamion'=> 'string',
        
    ];

    //Recepcion_Ciega puede tener un solo proveedor
    // relacion de uno a mucho

     public function proveedor()
     {
         return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function recepcionciega()
    {
      return $this->hasMany(RecepcionCiega::class, 'recepcin_ciega_id');
    }
    
}
