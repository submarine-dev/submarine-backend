<!DOCTYPE html>
<html>
<head>
    <title>Create Subscription</title>
</head>
<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/subscriptions" method="POST">
        @csrf
        <label for="name">Subscription Name</label>
        <input type="text" id="name" name="subscriptionName">
        <label for="icon">Icon</label>
        <input type="text" id="icon" name="icon">
        <label for="color">Color</label>
        <input type="text" id="color" name="color">
        <label for="cancel_url">Cancel URL</label>
        <input type="text" id="cancel_url" name="unsubscribeLink">
        <label for="plans">Plans</label>
        <input type="text" id="plans" name="plans[0][name]">
        <input type="text" id="plans" name="plans[0][price]">
        <input type="text" id="plans" name="plans[1][name]">
        <input type="text" id="plans" name="plans[1][price]">
        <input type="text" id="plans" name="plans[2][name]">
        <input type="text" id="plans" name="plans[2][price]">
        <button type="submit">Create Subscription</button>
    </form>
</body>
</html>
