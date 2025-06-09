@extends('layouts.app')

@section('title', __('messages.about_us'))

@section('content')
    <main class="form-page-container dark-theme awesome-success-bg">

        <div class="page-bubbles">
            <div class="graphic-shape shape-1"></div>
            <div class="graphic-shape shape-2"></div>
            <div class="graphic-shape shape-3"></div>
            <div class="graphic-shape shape-4"></div>
            <div class="graphic-shape shape-5"></div>
            <div class="graphic-shape shape-6"></div>
            <div class="graphic-shape shape-7"></div>
            <div class="graphic-shape shape-8"></div>
        </div>

        <div class="success-wrapper awesome-success" id="aboutCard">
            <!-- فقاعات جوه المربع -->
            <div class="success-graphic-elements">
                <div class="graphic-shape shape-1"></div>
                <div class="graphic-shape shape-2"></div>
                <div class="graphic-shape shape-3"></div>
                <div class="graphic-shape shape-4"></div>
            </div>

            <div class="success-icon-container">
                <i class="fas fa-info-circle success-icon"></i>
            </div>
            <h2>{{ __('messages.about_registra') }}</h2>
            <p>{{ __('messages.about_registra_desc') }}</p>
            <div class="success-actions">
                <a href="{{ route('home') }}" class="button-awesome-link">
                    <span>{{ __('messages.explore_now') }}</span>
                    <i class="fas fa-rocket"></i>
                </a>
            </div>
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

        .page-bubbles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }

        .page-bubbles .graphic-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.15;
            animation: float 6s ease-in-out infinite alternate;
            background: radial-gradient(circle, #ffdd55, #f7b500);
        }

        .page-bubbles .shape-1 {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 5%;
        }

        .page-bubbles .shape-2 {
            width: 150px;
            height: 150px;
            top: 70%;
            left: 15%;
        }

        .page-bubbles .shape-3 {
            width: 120px;
            height: 120px;
            top: 30%;
            right: 10%;
        }

        .page-bubbles .shape-4 {
            width: 180px;
            height: 180px;
            bottom: 15%;
            right: 20%;
        }

        .page-bubbles .shape-5 {
            width: 100px;
            height: 100px;
            top: 80%;
            right: 40%;
        }

        .page-bubbles .shape-6 {
            width: 130px;
            height: 130px;
            bottom: 5%;
            left: 30%;
        }

        .page-bubbles .shape-7 {
            width: 90px;
            height: 90px;
            top: 50%;
            left: 50%;
        }

        .page-bubbles .shape-8 {
            width: 110px;
            height: 110px;
            bottom: 30%;
            left: 45%;
        }

        /* فقاعات جوه المربع */
        .success-graphic-elements .graphic-shape {
            opacity: 0.15;
            animation: float 6s ease-in-out infinite alternate;
            border-radius: 50%;
        }

        /* استخدام ألوان متدرجة دهبيه */
        .success-graphic-elements .shape-1 {
            background: radial-gradient(circle, #fcd253, #f4b400);
            width: 150px;
            height: 150px;
            top: -75px;
            left: -75px;
            position: absolute;
        }

        .success-graphic-elements .shape-2 {
            background: radial-gradient(circle, #ffd700, #f5d76e);
            width: 100px;
            height: 100px;
            bottom: -50px;
            right: -50px;
            position: absolute;
        }

        .success-graphic-elements .shape-3 {
            background: radial-gradient(circle, #f4b400, #fcd253);
            width: 80px;
            height: 80px;
            top: 50%;
            left: -40px;
            transform: translateY(-50%);
            position: absolute;
        }

        .success-graphic-elements .shape-4 {
            background: radial-gradient(circle, #f5d76e, #ffd700);
            width: 60px;
            height: 60px;
            bottom: 20%;
            right: -30px;
            position: absolute;
        }

        /* حركة ناعمة للفقاعات */
        @keyframes float {
            0% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-10px) scale(1.05);
            }

            100% {
                transform: translateY(0) scale(1);
            }
        }


        .success-icon-container {
            margin-bottom: 2rem;
        }

        .success-icon {
            font-size: 4rem;
            color: #d8c3a5;
            /* لون بيج */
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
            background: linear-gradient(45deg, #d8c3a5, #67b26f);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .button-awesome-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(216, 195, 165, 0.4);
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