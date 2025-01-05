<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Detail</title>
</head>
<body>
    <h1>Transaction Detail</h1>
    <p>ID: {{ $transaction->id }}</p>
    <p>Amount: {{ $transaction->amount }}</p>
    <p>Description: {{ $transaction->description }}</p>
    <p>Type: {{ $transaction->type }}</p>
    <p>Date: {{ $transaction->transaction_date }}</p>
    <a href="{{ url('/') }}">Back</a>
</body>
</html>