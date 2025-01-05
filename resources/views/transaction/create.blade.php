<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Transaction</title>
</head>
<body>
    <form action="{{ url('store-transaction') }}" method="POST">
        @csrf
        <div>
            <label for="user_id">User Id:</label>
            <input type="number" id="user_id" name="user_id" required>
            <label for="category_id">Category ID:</label>
            <input type="number" id="category_id" name="category_id" required>
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required>
            <label for="amount">amount:</label>
            <input type="number" id="amount" name="amount" required>
            <label for="description">Desc:</label>
            <input type="text" id="description" name="description" required>
            <label for="transaction_date">Date</label>
            <input type="date" id="transaction_date" name="transaction_date" required>
        </div>
        <div>
            <button type="submit">Add Transaction</button>
        </div>
    </form>
</body>
</html>