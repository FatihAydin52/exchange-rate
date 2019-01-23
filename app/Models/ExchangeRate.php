<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExchangeRate
 * @package App\Models
 */
class ExchangeRate extends Model
{

    /**
     * Doldurulacak alanlar
     * @var array
     */
    protected $fillable = ['source', 'usd_try', 'eur_try', 'gbp_try'];

    /**
     * Minimum oranları almak için tanımlı sorgu
     * @param $query
     * @return mixed
     */
    public function scopeMinimumRates($query)
    {
        return $query->selectRaw('MIN(usd_try) as usd_try, MIN(eur_try) as eur_try, MIN(gbp_try) as gbp_try, MAX(updated_at) as updated_at');
    }
}
