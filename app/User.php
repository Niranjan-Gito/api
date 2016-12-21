<?php

namespace GitoAPI;

use GitoAPI\Repositories\Address\Address;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nicename','phone','site_id','user_name','login_type','newsletter'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Set the user's password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value){

        $this->attributes['password'] = Hash::make($value);

    }
    /**
     * add column name whatever you use in credentials
     * @param $username
     * @return mixed
     */
    public function findForPassport($username) {
        return self::where('site_id',siteId())->where('email', $username)->first();
    }

    /**
     * Get the address for the user.
     * @return relation
     */
    public function address()
    {
        return $this->hasMany(Address::class);
    }

}
