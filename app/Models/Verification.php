<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Verification
 *
 * @property $id
 * @property $code
 * @property $userId
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Verification extends Model
{
    
    static $rules = [
		'code' => 'required',
		'userId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['code','userId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'userId');
    }
    

}
