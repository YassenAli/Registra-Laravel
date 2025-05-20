<!DOCTYPE html>
<html>
<head>
    <title>{{ __('New User Registration') }}</title>
</head>
<body>
    <h2>{{ __('New User Registration') }}</h2>
    <p>{{ __('A new user has registered:') }}</p>
    <ul>
        <li>{{ __('Name') }}: {{ $user->full_name }}</li>
        <li>{{ __('Username') }}: {{ $user->user_name }}</li>
        <li>{{ __('Email') }}: {{ $user->email }}</li>
    </ul>
</body>
</html>
