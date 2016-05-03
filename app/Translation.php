<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'translations';

    /**
     * Get the phone record associated with the user.
     */
    public function category()
    {
        return $this->hasMany('App\TranslationCategory');
    }
}
