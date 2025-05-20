@extends('layouts.app')

@section('title', __('About Us'))

@section('content')
<div class="container">
    <h1>{{ __('About Us') }}</h1>
    <div class="content">
        <p>{{ __('Welcome to our registration system.') }}</p>
    </div>
</div>
@endsection
