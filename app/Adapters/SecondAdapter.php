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
 * Class SecondAdapter
 * @package App\Adapters
 */
class SecondAdapter implements ExchangeRateAdapterInterface
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
     * SecondAdapter constructor.
     * @param HttpRequester $httpRequester
     */
    public function __construct(HttpRequester $httpRequester)
    {
        $response = $httpRequester->load(config('exchange_rate.providers.second_provider.url'));
        $this->usdTry = $this->find($response, 'DOLAR');
        $this->eurTry = $this->find($response, 'AVRO');
        $this->gbpTry = $this->find($response, 'İNGİLİZ STERLİNİ');
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
                if ($item->kod === $key) {
                    return $item->oran;
                }
            }
        }
    }


    /**
     * @return mixed
     */
    public function getSource()
    {
        return config('exchange_rate.providers.second_provider.key');
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