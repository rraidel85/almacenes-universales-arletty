<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Proveedor
 * @package App\Models
 * @version October 18, 2022, 1:44 pm UTC
 *
 * @property string $nombre
 */
class Proveedor extends Model
{


    public $table = 'proveedores';
    



    public $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'provincia',
        'identificador',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'direccion'=> 'string',
        'id' => 'integer',
        'telefono'=> 'integer',
        'provincia' => 'string',
        'identificador'=> 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre'=> 'required|regex:/^[\pL\s\-]+$/u',
        'direccion' => 'required|string',
        'provincia'=> 'required|regex:/^[\pL\s\-]+$/u',
        'telefono'=> 'required|integer' ,
        'identificador'=> 'required|integer'
    

        
    ];

    // Proveedor puede estar en varias Recepcion_Ciega
    //relacion de uno a muchos

   public function recepcionciega()
    {
      return $this->hasMany(RecepcionCiega::class, 'recepcin_ciega_id');
    }
    
}
