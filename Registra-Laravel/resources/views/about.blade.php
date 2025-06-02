@extends('layouts.app')

@section('title', __('About Us'))

@section('content')
<main class="form-page-container dark-theme awesome-success-bg">
    <div class="success-wrapper awesome-success" id="aboutCard">
        <div class="success-graphic-elements">
            <span class="graphic-shape shape-1"></span>
            <span class="graphic-shape shape-2"></span>
        </div>
        <div class="success-icon-container">
            <i class="fas fa-info-circle success-icon"></i>
        </div>
        <h2>{{ __('About Registra') }}</h2>
        <p>{{ __('Registra is dedicated to providing an excellent experience for users who seek seamless and efficient registration processes.') }}</p>
        <div class="success-actions">
            <a href="{{ route('home') }}" class="button-awesome-link">
                <span>{{ __('Explore Now') }}</span>
                <i class="fas fa-rocket"></i>
            </a>
        </div>
        <span class="graphic-shape shape-3"></span>
        <span class="graphic-shape shape-4"></span>
    </div>
</main>
@endsection

@push('styles')
<style>
    .dark-theme {
        background-color: #1a1a1a;
        color: #ffffff;
    }

    .awesome-success-bg {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .awesome-success {
        position: relative;
        background: linear-gradient(145deg, #2a2a2a, #1a1a1a);
        border-radius: 20px;
        padding: 3rem;
        text-align: center;
        max-width: 600px;
        width: 100%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .success-graphic-elements {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .graphic-shape {
        position: absolute;
        background: linear-gradient(45deg, #4a90e2, #67b26f);
        border-radius: 50%;
        opacity: 0.1;
    }

    .shape-1 {
        width: 150px;
        height: 150px;
        top: -75px;
        left: -75px;
    }

    .shape-2 {
        width: 100px;
        height: 100px;
        bottom: -50px;
        right: -50px;
    }

    .shape-3 {
        width: 80px;
        height: 80px;
        top: 50%;
        left: -40px;
        transform: translateY(-50%);
    }

    .shape-4 {
        width: 60px;
        height: 60px;
        bottom: 20%;
        right: -30px;
    }

    .success-icon-container {
        margin-bottom: 2rem;
    }

    .success-icon {
        font-size: 4rem;
        color: #4a90e2;
        animation: pulse 2s infinite;
    }

    .success-wrapper h2 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #ffffff;
    }

    .success-wrapper p {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #cccccc;
        margin-bottom: 2rem;
    }

    .success-actions {
        margin-top: 2rem;
    }

    .button-awesome-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(45deg, #4a90e2, #67b26f);
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: bold;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .button-awesome-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
    }

    .button-awesome-link i {
        transition: transform 0.3s ease;
    }

    .button-awesome-link:hover i {
        transform: translateX(5px);
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.1);
            opacity: 0.8;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>
@endpush
