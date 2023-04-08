<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Provider
 *
 * @property $id
 * @property $url
 * @property $idImage1
 * @property $idImage2
 * @property $idNo
 * @property $userId
 * @property $service_type
 * @property $created_at
 * @property $updated_at
 *
 * @property Document[] $documents
 * @property Offer[] $offers
 * @property ProviderService[] $providerServices
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Provider extends Model
{

    static $rules = [
		'idImage1' => 'required',
		'idImage2' => 'required',
		'userId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['url','idImage1','idImage2','idNo','userId','service_type','balance'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany('App\Models\Document', 'providerId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offers()
    {
        return $this->hasMany('App\Models\Offer', 'providerId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function providerServices()
    {
        return $this->hasMany('App\Models\ProviderService', 'providerId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'userId');
    }


}
