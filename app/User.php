<?php

namespace App;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usertype()
    {
        return $this->belongsTo('App\UserType', 'user_type_id');
    }

    /**
     * Get the user that owns the billingaddress.
     */
    public function billingaddress()
    {
        return $this->hasOne('App\UserBillingaddress', 'user_id');
    }

    /**
     * A User has many Invoices
     */
    public function invoices()
    {
        return $this->hasMany('App\Invoice', 'user_id');
    }
}
