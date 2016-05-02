<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Mpociot\VatCalculator\VatCalculator;

/**
 * Class Invoice
 * @package App
 */
class Invoice extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    protected $country;


    /**
     * @param $date
     * @return string
     */
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    /**
     * @param $balance
     * @return string
     */
    public function getBalanceAttribute($balance)
    {
        $vat = new VatCalculator();
        return $vat->calculate($balance, 'DE');
    }


    /**
     * An Invoice belongs to a user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * An Invoice belongs to a Country
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
