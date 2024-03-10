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
    <h1>Subscription List</h1>
    <table>
        <tr>
            <th>Subscription Name</th>
            <th>Icon</th>
            <th>Color</th>
            <th>Cancel URL</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        @foreach ($subscriptions as $subscription)
            <tr>
                <td>{{ $subscription->subscription_name }}</td>
                <td>{{ $subscription->icon }}</td>
                <td>{{ $subscription->color }}</td>
                <td>{{ $subscription->cancel_url }}</td>
                <td>
                    <a href="/api/subscriptions/{{ $subscription->id }}">Edit</a>
                <td>
                    <form action="/api/subscriptions/{{ $subscription->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
</body>
</html>
