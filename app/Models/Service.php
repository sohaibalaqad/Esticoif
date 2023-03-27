<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property $id
 * @property $enName
 * @property $arName
 * @property $frName
 * @property $gender
 * @property $city_id
 * @property $price
 * @property $type
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property City $city
 * @property ProviderService[] $providerServices
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{
    
    static $rules = [
		'enName' => 'required',
		'city_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['enName','arName','frName','gender','city_id','price','type','description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function providerServices()
    {
        return $this->hasMany('App\Models\ProviderService', 'serviceId', 'id');
    }
    

}
