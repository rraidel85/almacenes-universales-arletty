<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Almacen
 * @package App\Models
 * @version October 18, 2022, 2:03 pm UTC
 *
 * @property string $nombre
 */
class Almacen extends Model
{


    public $table = 'almacenes';
    



    public $fillable = [
        'nombre',
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'id'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       // 'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        
    ];

    	//Almacen tiene muchas áreas
        public function areas()
        {
          return $this->hasMany(Area::class);
        }

    
}
