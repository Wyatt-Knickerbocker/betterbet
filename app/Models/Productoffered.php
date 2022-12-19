<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $ship_cost
 * @property int   $ship_time
 */
class Productoffered extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productoffered';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seller_id', 'product_ian', 'cost', 'ship_cost', 'ship_time'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ship_cost' => 'double', 'ship_time' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
}
