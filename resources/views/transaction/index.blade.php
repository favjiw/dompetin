<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction</title>
</head>
<body>
    <h1>Transaction</h1>
    @foreach ($transactions as $item)
        <p>{{ $item->id }}</p>
        <p>{{ $item->amount }}</p>
        <p>{{ $item->description }}</p>
        <p>{{ $item->type }}</p>
        <p>{{ $item->created_at }}</p>
        <p>{{ $item->updated_at }}</p>
        <a href="{{ url('transaction/detail/' .$item->id) }}">Link</a>
    @endforeach
</body>
</html>