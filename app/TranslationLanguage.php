<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationLanguage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'translations_language';

    /**
     * Get the user that owns the phone.
     */
    public function category()
    {
        return $this->belongsTo('App\TranslationCategory');
    }
}
