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
    <h1>User Subscription List</h1>
    <table>
        <tr>
            <th>id</th>
            <th>Plan Name</th>
            <th>delete</th>
        </tr>
        @foreach ($userSubscriptions as $userSubscription)
            <tr>
                <td>{{ $userSubscription->id }}</td>
                <td>{{ $userSubscription->plan->plan_name }}</td>
                <td>
                    <form action="/api/users/{{ 1 }}/subscriptions/{{ 2 }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
</body>
</html>
