<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contact_type_id', 'organisation',
    ];

    /**
 * A Billing Address belongs to a contact
 */
    public function billing()
    {
        return $this->belongsTo('App\ContactBillingAddress', 'contacts_billing_address_id');
    }

    /**
     * A Contact belongs to a Contact Type
     */
    public function type()
    {
        return $this->belongsTo('App\ContactType', 'contact_type_id');
    }

}
