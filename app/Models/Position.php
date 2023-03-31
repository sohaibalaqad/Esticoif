<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Position
 *
 * @property $id
 * @property $lang
 * @property $lat
 * @property $userId
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Position extends Model
{
    
    static $rules = [
		'lang' => 'required',
		'lat' => 'required',
		'userId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lang','lat','userId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'userId');
    }
    

}
