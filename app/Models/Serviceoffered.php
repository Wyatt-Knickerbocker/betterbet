<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int   $speed
 * @property int   $data_cap
 * @property int   $contract_length
 * @property float $contract_penalty
 */
class Serviceoffered extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'serviceoffered';

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
        'service_id', 'users_id', 'speed', 'data_cap', 'contract_length', 'contract_penalty'
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
        'speed' => 'int', 'data_cap' => 'int', 'contract_length' => 'int', 'contract_penalty' => 'double'
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
