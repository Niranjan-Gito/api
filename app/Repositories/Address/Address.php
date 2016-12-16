<?php
namespace GitoAPI\Repositories\Address;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            "alpha_street","beta_street","city","state","country",
            "zipcode","site_id","first_name","last_name","email",
            "nicename",
    ];
}