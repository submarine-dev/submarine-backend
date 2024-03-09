<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/api/users/{ $userId }/subscriptions" method="POST">
        @csrf
        <input type="hidden" id="userId" name="user_id" value="{{ $user->id }}">
        <label for="subscriptionId">Subscription ID</label>
        <input type="text" id="subscriptionId" name="plan_id">
        <button type="submit">Create User Subscription</button>
</body>
</html>