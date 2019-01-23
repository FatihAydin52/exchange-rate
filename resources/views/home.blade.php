<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Döviz Kuru Uygulaması</title>
    <!-- Styles -->
    <style>
        html, body {
            margin: 0;
            padding: 0;
        }

        .container {
            margin: auto;
            width: 90%;
            max-width: 960px;
        }

        #exchangeRates {
            width: 100%;
            border: 1px solid #ddd;
        }

        #exchangeRates td, #exchangeRates th {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

    </style>
</head>
<body>
<div class="container">
    <table id="exchangeRates" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th>USD</th>
            <th>EURO</th>
            <th>GBP</th>
            <th>Son Güncelleme Tarihi</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$exchangeRates->usd_try}}</td>
            <td>{{$exchangeRates->eur_try}}</td>
            <td>{{$exchangeRates->gbp_try}}</td>
            <td>{{$exchangeRates->updated_at}}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
