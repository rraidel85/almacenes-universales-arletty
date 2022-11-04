<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Cliente
 * @package App\Models
 * @version October 18, 2022, 10:47 pm UTC
 *
 * @property string $nombrecompañia
 * @property string $direccion
 * @property integer $telefono
 */
class Cliente extends Model
{


    public $table = 'clientes';
    



    public $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'identificador'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'direccion' => 'string',
        'telefono' => 'integer',
        'identificador'=> 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        'direccion'=>'required|string',
        'telefono'=> 'required|integer',
        'identificador'=>'required|integer'
    ];

    
}
