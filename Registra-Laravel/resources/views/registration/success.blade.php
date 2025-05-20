@extends('layouts.app')

@section('title', __('Registration Successful'))

@section('content')
<div class="container">
    <div class="success-wrapper awesome-success">
        <div class="success-icon-container">
            <i class="fas fa-check-circle success-icon"></i>
        </div>
        <h2>{{ __('Registration Successful!') }}</h2>
        <p>{{ __('Thank you for registering with us.') }}</p>
        <div class="success-actions">
            <a href="{{ route('home') }}" class="button-awesome-link">
                <span>{{ __('Return to Home') }}</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection
