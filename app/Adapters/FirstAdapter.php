<?php
/**
 * Created by PhpStorm.
 * User: aydin
 * Date: 22.01.2019
 * Time: 19:26
 */

namespace App\Adapters;

use App\Facades\HttpRequester;

/**
 * Class FirstAdapter
 * @package App\Adapters
 */
class FirstAdapter implements ExchangeRateAdapterInterface
{
    /**
     * Dolar Kuru
     * @var
     */
    private $usdTry;

    /**
     * Euro Kuru
     * @var
     */
    private $eurTry;

    /**
     * İngiliz Sterlini Kuru
     * @var
     */
    private $gbpTry;


    /**
     * FirstAdapter constructor.
     * @param HttpRequester $httpRequester
     */
    public function __construct(HttpRequester $httpRequester)
    {
        $result = $httpRequester->load(config('exchange_rate.providers.first_provider.url'));
        $response = $result->result;

        $this->usdTry = $this->find($response, 'USDTRY');
        $this->eurTry = $this->find($response, 'EURTRY');
        $this->gbpTry = $this->find($response, 'GBPTRY');
    }

    /**
     * Servisten dönen değerler içinde istenilen kur bilgisini bulma
     * @param $source
     * @param $key
     * @return mixed
     */
    private function find($source, $key)
    {
        if (!empty($source)) {
            foreach ($source as $item) {
                if ($item->symbol === $key) {
                    return $item->amount;
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return config('exchange_rate.providers.first_provider.key');
    }

    /**
     * @return mixed
     */
    public function getUsdTry()
    {
        return $this->usdTry;
    }

    /**
     * @return mixed
     */
    public function getEurTry()
    {
        return $this->eurTry;
    }

    /**
     * @return mixed
     */
    public function getGbpTry()
    {
        return $this->gbpTry;
    }
}