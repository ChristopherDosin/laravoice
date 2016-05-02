<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
    ];

    /**
     * A User Type belongs to a User
     */
    public function user()
    {
        $this->hasMany('App\User');
    }
}
