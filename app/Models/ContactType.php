<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'shortcut', 'color'
    ];


    /**
     * A Contact Type belongs to a contact
     */
    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }
    
}
