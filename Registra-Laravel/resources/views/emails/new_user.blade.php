<!DOCTYPE html>
<html>

<head>
    <title>{{ __('messages.new_user_registration') }}</title>
</head>

<body>
    <h2>{{ __('messages.new_user_registration') }}</h2>
    <p>{{ __('messages.new_user_registered') }}</p>
    <ul>
        <li>{{ __('messages.name') }}: {{ $user->full_name }}</li>
        <li>{{ __('messages.username') }}: {{ $user->user_name }}</li>
        <li>{{ __('messages.email') }}: {{ $user->email }}</li>
    </ul>
</body>

</html>