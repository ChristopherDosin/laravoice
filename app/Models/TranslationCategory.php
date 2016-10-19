<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslationCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'translations_category';

    /**
     * Get the user that owns the phone.
     */
    public function translation()
    {
        return $this->belongsTo('App\Translation');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function language()
    {
        return $this->hasOne('App\TranslationLanguage');
    }
}
