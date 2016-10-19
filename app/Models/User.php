<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the Type of the User which he belongs to.
     */
    public function usertype()
    {
        return $this->belongsTo('App\Models\UserType', 'user_type_id');
    }

    /**
     * Get the User that owns the billingaddress.
     */
    public function billingaddress()
    {
        return $this->hasOne('App\Models\UserBillingaddress', 'user_id');
    }

    /**
     * A User has many Invoices
     */
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice', 'user_id');
    }
}
