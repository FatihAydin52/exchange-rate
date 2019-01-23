<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Ana sayfa gösterimi
     */
    public function index()
    {
        $exchangeRates = ExchangeRate::minimumRates()->first();

        return view('home', compact('exchangeRates'));
    }
}
