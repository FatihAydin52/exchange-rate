## Laravel Altyapısı ile Hazırlanmış Döviz Kuru Uygulaması

Mevcut olarak 2 farklı servisten kur birgisini `php artisan exchange-rate:sync` komutu ile çekip veritabanına kaydeden ve farklı servislerden aldığı kur bilgilerinden en düşük olanları gösteren uygulamadır. Yeni bir kur bilgisi servisi eklenmek istendiğinde Adapter oluşturularak sisteme entegre edilmesi amaçlanmıştır.

- Utils\Adapters klasörü içinde işlemleri gerçekleştiren adapterlar bulunmaktadır. Yeni bir adapter eklenmek istendiğinde `ExchangeRateAdapterInterface` sınıfı implemente edilmelidir. config\exchange_rate.php sınıfının içerisine servisin urlsi ve benzersiz değeri eklenmelidir.
- Utils\HttpClient klasörü içinde sistemin http isteklerini gerçekleştirebilmesi için adapterlar bulunmaktadır. Şu anda guzzle kütüphanesi eklidir. Yeni bir kütüphane eklenmek istendiğinde `HttpClientInterface` sınıfı implemente edilmelidir.
- Unit testler yazılmıştır.
