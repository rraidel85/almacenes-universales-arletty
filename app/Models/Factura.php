<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Factura
 * @package App\Models
 * @version October 27, 2022, 10:12 pm UTC
 *
 * @property string $fecha
 */
class Factura extends Model
{


    public $table = 'facturas';
    



    public $fillable = [
        'fecha',
        'oferta_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha'=>'required|date',
    ];

    public function oferta()
    {
        return $this->belongsTo(Oferta::class);
   }

    
}
