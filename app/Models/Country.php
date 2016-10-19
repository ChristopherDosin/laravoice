<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * An Invoice belongs to a Country
     */
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }

    /**
     * An Invoice belongs to a Country
     */
    public function billingaddress()
    {
        return $this->hasOne('App\Models\UserBillingaddress', 'user_id');
    }
}
