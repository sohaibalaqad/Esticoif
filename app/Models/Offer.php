<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Offer
 *
 * @property $id
 * @property $providerId
 * @property $serviceUserId
 * @property $price
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Provider $provider
 * @property ServiceUser $serviceUser
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Offer extends Model
{
    
    static $rules = [
		'providerId' => 'required',
		'serviceUserId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['providerId','serviceUserId','price','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provider()
    {
        return $this->hasOne('App\Models\Provider', 'id', 'providerId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceUser()
    {
        return $this->hasOne('App\Models\ServiceUser', 'id', 'serviceUserId');
    }
    

}
