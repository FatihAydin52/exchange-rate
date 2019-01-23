<?php
/**
 * Created by PhpStorm.
 * User: aydin
 * Date: 22.01.2019
 * Time: 19:18
 */

namespace App\Adapters;

interface ExchangeRateAdapterInterface
{
    /**
     * @return mixed
     */
    public function getSource();

    /**
     * @return mixed
     */
    public function getUsdTry();

    /**
     * @return mixed
     */
    public function getEurTry();

    /**
     * @return mixed
     */
    public function getGbpTry();

}