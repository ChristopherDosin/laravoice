<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBillingaddress extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_billingaddress';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company', 'street', 'postalcode', 'city', 'country_id',
    ];


    /**
     * A billingaddress belongs to a user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A billingaddress belongs to a country
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }


}
