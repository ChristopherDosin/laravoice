<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactBillingAddress extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts_billing_address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street', 'postalcode', 'city', 'contact_id', 'country_id',
    ];


    /**
     * A billingaddress belongs to a contact
     */
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    /**
     * A billingaddress belongs to a country
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }


}
