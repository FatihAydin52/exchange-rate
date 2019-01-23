<?php

namespace App\Console\Commands;

use App\Models\ExchangeRate;
use App\Adapters\FirstAdapter;
use App\Adapters\SecondAdapter;
use App\Facades\HttpRequester;
use App\Utils\HttpClient\GuzzleAdapter;
use Illuminate\Console\Command;

/**
 * Class SyncExchangeRatesCommand
 * @package App\Console\Commands
 */
class SyncExchangeRatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange-rate:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tanımlanmış servislerden döviz kurlarını çeker.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $facade = new HttpRequester(new GuzzleAdapter());


        $this->info('İşlemler başlatılıyor.');

        $this->info('Birinci servisten kurlar alınıyor.');
        $this->insertOrUpdate(new FirstAdapter($facade));
        $this->info('Birinci servisten kurlar alındı.');

        $this->info('İkinci servisten kurlar alınıyor.');
        $this->insertOrUpdate(new SecondAdapter($facade));
        $this->info('İkinci servisten kurlar alındı.');


        $this->info('İşlemler tamamlandı.');
    }


    /**
     * Kaynak varsa değerleri güncellesin yoksa eklesin
     * @param $adapter
     */
    public function insertOrUpdate($adapter)
    {
        ExchangeRate::updateOrCreate([
            'source' => $adapter->getSource()
        ], [
            'source' => $adapter->getSource(),
            'usd_try' => $adapter->getUsdTry(),
            'eur_try' => $adapter->getEurTry(),
            'gbp_try' => $adapter->getGbpTry(),
        ]);
    }
}
