<!DOCTYPE html>
<html>
<head>
    <title>Create Subscription</title>
</head>
<body>
    
    <form action="/api/users/1/subscriptions/3" method="POST">
        @method('PUT')
        @csrf
        <label for="plan_id">Plan ID</label>
        <input type="text" id="plan_id" name="plan_id" value="{{ $userSubscription->plan_id }}">
        <button type="submit">update Subscription</button>
    </form>
</body>
</html>
