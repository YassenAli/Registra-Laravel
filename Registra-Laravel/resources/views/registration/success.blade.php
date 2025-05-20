@extends('layouts.app')

@section('title', __('Registration Successful'))

@section('content')
<div class="success-wrapper awesome-success">
    <div class="success-icon-container">
        <i class="fas fa-check-circle success-icon"></i>
    </div>
    <h2>{{ __('Awesome! You\'re Registered!') }}</h2>
    <p>{{ __('Your spot is secured. Welcome to the Registra community!') }}</p>
</div>
@endsection