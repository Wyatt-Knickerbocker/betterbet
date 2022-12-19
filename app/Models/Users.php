<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property string $cust_terms
 * @property string $remember_token
 * @property int    $isvendor
 * @property int    $created_at
 * @property int    $updated_at
 * @property float  $contract_penalty
 */
class Users extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
        'firstname', 'lastname', 'email', 'password', 'isvendor', 'cust_terms', 'contract_penalty', 'created_at', 'updated_at', 'remember_token'
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
        'firstname' => 'string', 'lastname' => 'string', 'email' => 'string', 'password' => 'string', 'isvendor' => 'int', 'cust_terms' => 'string', 'contract_penalty' => 'double', 'created_at' => 'timestamp', 'updated_at' => 'timestamp', 'remember_token' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
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
