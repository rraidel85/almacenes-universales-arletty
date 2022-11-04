<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class StockProducto
 * @package App\Models
 * @version October 18, 2022, 2:33 pm UTC
 *
 * @property integer $cantidad
 * @property number $precio_compra
 * @property string $fecha_entrada
 * @property string $feha_produccion
 * @property string $fecha_vencimiento
 */
class StockProducto extends Model
{


    public $table = 'stock_producto';
    



    public $fillable = [
        'cantidad',
        'precio_compra',
        'fecha_entrada',
        'feha_produccion',
        'fecha_vencimiento',
        'producto_id',
        'recepcin_ciega_id',
        'areas_id'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cantidad' => 'integer',
        'precio_compra' => 'double',
        'fecha_entrada' => 'datetime',
        'feha_produccion' => 'datetime',
        'fecha_vencimiento' => 'datetime',
        'id' => 'integer',
        'producto_id'=> 'integer',
        'recepcin_ciega_id'=>'integer',
        'areas_id'=>'integer'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cantidad' => 'required|integer',
        'precio_compra' => 'required|numeric',
        'fecha_entrada'=> 'required|date',
        
        'fecha_vencimiento'=> 'required|date'



    ];
  
  
    //Stock_Productos tiene un solo Producto
  //relacion de uno a mucho
  public function producto()
  {
      return $this->belongsTo(Producto::class, 'producto_id');
 }

 //Stock_Productos pertenece a una Recepcion_Ciega
 public function recepcion_ciega()
  {
      return $this->belongsTo(RecepcionCiega::class, 'recepcin_ciega_id');
 }

 //Stock_Productos pertenece a un area
 public function areas()
  {
      return $this->belongsTo(Area::class, 'areas_id');
 }


 public function ofertas()
  {
      return $this->belongsToMany(Oferta::class, 'oferta_id');
 }
    
}
