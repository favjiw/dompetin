<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Edit</title>
</head>
<body>
    <form action="{{ url('/transaction/update/' .$transaction->id) }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $transaction->id }}">
        <div>
            <label for="user_id">User Id:</label>
            <input type="number" id="user_id" name="user_id" value="{{ $transaction->user_id }}" required>
            <label for="category_id">Category ID:</label>
            <input type="number" id="category_id" name="category_id" value="{{ $transaction->category_id }}" required>
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" value="{{ $transaction->type }}" required>
            <label for="amount">amount:</label>
            <input type="number" id="amount" name="amount" value="{{ $transaction->amount }}" required>
            <label for="description">Desc:</label>
            <input type="text" id="description" name="description" value="{{ $transaction->description }}" required>
            <label for="transaction_date">Date</label>
            <input type="date" id="transaction_date" name="transaction_date" value="{{ $transaction->transaction_date }}" required>
        </div>
        <div>
            <button type="submit">Update Transaction</button>
        </div>
    </form>
    <a href="{{ url('/') }}">Back</a>
</body>
</html>