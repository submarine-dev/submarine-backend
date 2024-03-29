<!DOCTYPE html>
<html>
<head>
    <title>Create Subscription</title>
</head>
<body>
    
    <form action="/api/subscriptions/{subscriptionId}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="subscriptionId" value="{{ $subscription->id }}">
        <label for="name">Subscription Name</label>
        <input type="text" id="name" name="subscriptionName" value="{{ $subscription->subscription_name }}">
        <label for="icon">Icon</label>
        <input type="text" id="icon" name="icon" value="{{ $subscription->icon }}">
        <label for="color">Color</label>
        <input type="text" id="color" name="color" value="{{ $subscription->color }}">
        <label for="cancel_url">Cancel URL</label>
        <input type="text" id="cancel_url" name="unsubscribeLink" value="{{ $subscription->cancel_url }}">
        <label for="plans">Plans</label>
        <input type="text" id="plans" name="plans[0][name]" value="{{ $subscription->plans[0]['plan_name'] }}">
        <input type="text" id="plans" name="plans[0][price]" value="{{ $subscription->plans[0]['plan_fee'] }}">
        <input type="text" id="plans" name="plans[1][name]" value="{{ $subscription->plans[1]['plan_name'] }}">
        <input type="text" id="plans" name="plans[1][price]" value="{{ $subscription->plans[1]['plan_fee'] }}">
        <input type="text" id="plans" name="plans[2][name]" value="{{ $subscription->plans[2]['plan_name'] }}">
        <input type="text" id="plans" name="plans[2][price]" value="{{ $subscription->plans[2]['plan_fee'] }}">
        <button type="submit">update Subscription</button>
    </form>
</body>
</html>
