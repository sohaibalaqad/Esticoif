<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property $id
 * @property $firstName
 * @property $lastName
 * @property $email
 * @property $phone_number
 * @property $password
 * @property $two_factor_secret
 * @property $two_factor_recovery_codes
 * @property $two_factor_confirmed_at
 * @property $act
 * @property $gender
 * @property $typeId
 * @property $email_verified_at
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Position[] $positions
 * @property ServiceUser[] $serviceUsers
 * @property Token[] $tokens
 * @property UserType $userType
 * @property Verification[] $verifications
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    static $rules = [
		'firstName' => 'required',
		'lastName' => 'required',
		'email' => 'required',
		'phone_number' => 'required',
		'typeId' => 'required',
        'city_id' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['firstName','lastName','email','city_id','phone_number', 'password', 'two_factor_secret','two_factor_recovery_codes','two_factor_confirmed_at','act','gender','typeId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function positions()
    {
        return $this->hasMany('App\Models\Position', 'userId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceUsers()
    {
        return $this->hasMany('App\Models\ServiceUser', 'userId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany('App\Models\Token', 'userId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userType()
    {
        return $this->hasOne('App\Models\UserType', 'id', 'typeId');
    }

    public function city()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function verifications()
    {
        return $this->hasMany('App\Models\Verification', 'userId', 'id');
    }


}
