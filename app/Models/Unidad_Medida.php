<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Unidad_Medida
 * @package App\Models
 * @version October 25, 2022, 3:17 pm UTC
 *
 * @property string $nombre
 * @property string $simbolo
 * @property integer $equivalencia
 */
class Unidad_Medida extends Model
{

    use HasFactory;

    public $table = 'unidades_medidas';
    



    public $fillable = [
        'nombre',
        'simbolo',
        'equivalencia'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'simbolo' => 'string',
        'equivalencia' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre'=> 'required|regex:/^[\pL\s\-]+$/u',
        'simbolo'=>'required|regex:/^[\pL\s\-]+$/u',
        'equivalencia'=> 'integer'
       

        
    ];

    
        //Unidad de Medida puede pertenece a Muchos Productos
        //relacion de uno a muchos

        public function producto()
        {
          return $this->hasMany(Producto::class, 'producto_id');
        }
}
