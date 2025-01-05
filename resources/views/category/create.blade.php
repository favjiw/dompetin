<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
</head>
<body>
    <form action="{{ url('store-category') }}" method="POST">
        @csrf
        <div>
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <button type="submit">Create Category</button>
        </div>
    </form>
</body>
</html>