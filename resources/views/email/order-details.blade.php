<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order details email</title>
</head>
<body>
<h1>Dear customer</h1>

<p>Thank you for your purchase...</p>
<p>You buy {{ $order->amount_of_currency_purchased }} {{ $order->currencyPurchased->name }} on exchange rate {{ $order->exchangeRate->rate }} for 1 ({{ $order->currency->code }})</p>
<p>Amount Paid in {{ $order->amount_paid_in_dollars }} {{ $order->currency->name }}</p>
<p>For this action you have been surcharged with {{ $order->amount_of_surcharge }} {{ $order->currency->name }}</p>

<p>Best regards.</p>

</body>
</html>
