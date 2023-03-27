<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceUser
 *
 * @property $id
 * @property $userId
 * @property $serviceId
 * @property $evaluation
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Offer[] $offers
 * @property Service $service
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ServiceUser extends Model
{
    
    static $rules = [
		'userId' => 'required',
		'serviceId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['userId','serviceId','evaluation','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offers()
    {
        return $this->hasMany('App\Models\Offer', 'serviceUserId', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->hasOne('App\Models\Service', 'id', 'serviceId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'userId');
    }
    

}
