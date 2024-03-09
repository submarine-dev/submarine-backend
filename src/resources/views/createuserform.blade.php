<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    //usersテーブルにデータを追加するためのフォーム
    <form action="/users" method="POST">
        @csrf
        <label for="id">User ID</label>
        <input type="text" id="id" name="id">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
        <button type="submit">Create User</button>
    </form>
</body>
</html>