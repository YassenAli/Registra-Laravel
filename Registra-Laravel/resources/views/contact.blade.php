@extends('layouts.app')

@section('title', __('messages.contact.title'))

@section('content')


<div class="success-graphic-elements">
    <div class="graphic-shape shape-1"></div>
    <div class="graphic-shape shape-2"></div>
    <div class="graphic-shape shape-3"></div>
    <div class="graphic-shape shape-4"></div>
    <div class="graphic-shape shape-5"></div>
    <div class="graphic-shape shape-6"></div>
    <div class="graphic-shape shape-7"></div>
    <div class="graphic-shape shape-8"></div>
</div>


<main class="contact-container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ __('messages.contact.success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <section class="contact-info">
    <div class="success-graphic-elements">
        <div class="graphic-shape shape-1"></div>
        <div class="graphic-shape shape-2"></div>
        <div class="graphic-shape shape-3"></div>
    </div>
     <h2>{{ __('messages.contact.title') }}</h2>
        <p>{{ __('messages.contact.description') }}</p>
        <div class="contact-details">
            <p><i class="fas fa-map-marker-alt"></i> {{ __('messages.contact.address') }}</p>
            <p><i class="fas fa-phone"></i> {{ __('messages.contact.phone') }}</p>
            <p><i class="fas fa-envelope"></i> {{ __('messages.contact.email') }}</p>
        </div>
</section>

<section class="contact-form">
    <div class="success-graphic-elements">
        <div class="graphic-shape shape-4"></div>
        <div class="graphic-shape shape-5"></div>
        <div class="graphic-shape shape-6"></div>
    </div>
     <h3>{{ __('messages.contact.form_title') }}</h3>
        <form action="{{ route('contact.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="{{ __('messages.contact.name') }}" required>
                @error('name') <span class="error-messages">{{ $messages }}</span> @enderror
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="{{ __('messages.contact.email_input') }}" required>
                @error('email') <span class="error-messages">{{ $messages }}</span> @enderror
            </div>
            <div class="form-group">
                <textarea name="messages" placeholder="{{ __('messages.contact.messages') }}" required></textarea>
                @error('messages') <span class="error-messages">{{ $messages }}</span> @enderror
            </div>
            <button type="submit" class="submit-btn">
                <i class="fas fa-paper-plane"></i> {{ __('messages.contact.submit') }}
            </button>
    </form>
</section>

<section class="contact-map">
    <div class="success-graphic-elements">
        <div class="graphic-shape shape-7"></div>
        <div class="graphic-shape shape-8"></div>
    </div>
     <h3>{{ __('messages.contact.find_us') }}</h3>
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.30591910525!2d-74.25986432970718!3d40.697149422113014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1645564750983!5m2!1sen!2s"
            width="100%"
            height="300"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </div>
</section>

</main>
@endsection

@push('styles')
<style>
    
    body, .dark-theme {
        background-color: #1a1a1a;
        color: #ffffff;
    }

    .alert {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 10px;
        width: 100%;
        position: relative;
        overflow: hidden;
        background: #222;
        border: 1px solid #444;
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.1);
    }

    .alert-success {
        background: linear-gradient(135deg, #4e4e4e, #2a2a2a);
        color: #f4e2d8;
        border-color: #d8c3a5;
    }

    .alert-danger {
        background: linear-gradient(135deg, #5a2a2a, #2a1a1a);
        color: #f8d7da;
        border-color: #f5c6cb;
    }

    .alert ul {
        margin: 0;
        padding-left: 1.5rem;
    }

    .contact-container {
        max-width: 1200px;
        margin: 3rem auto;
        padding: 0 1rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .contact-info, .contact-form, .contact-map {
        background: linear-gradient(145deg, #2a2a2a, #1a1a1a);
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
    }

    .contact-info h2, .contact-form h3, .contact-map h3 {
        color: #fcd253;
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }

    .contact-details {
        margin-top: 1.5rem;
    }

    .contact-details p {
        margin: 1rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #cccccc;
    }

    .contact-details i {
        color: #fcd253;
        font-size: 1.2rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        background-color: #1a1a1a;
        border: 1px solid #555;
        color: #fff;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-group textarea {
        min-height: 150px;
        resize: vertical;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #fcd253;
        outline: none;
    }

    .error-messages {
        color: #ff6b6b;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }

    .submit-btn {
        background: linear-gradient(45deg, #fcd253, #f4b400);
        color: #1a1a1a;
        padding: 1rem 2rem;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        font-weight: bold;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(252, 210, 83, 0.4);
    }

    .map-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(255, 215, 0, 0.1);
    }

    @media (max-width: 768px) {
        .contact-container {
            grid-template-columns: 1fr;
        }
    }

    .success-graphic-elements {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
    }

    .graphic-shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.12;
        animation: float 6s ease-in-out infinite alternate;
    }

    .shape-1 {
        background: radial-gradient(circle, #fcd253, #f4b400);
        width: 150px;
        height: 150px;
        top: -75px;
        left: -75px;
    }

    .shape-2 {
        background: radial-gradient(circle, #ffd700, #f5d76e);
        width: 100px;
        height: 100px;
        bottom: -50px;
        right: -50px;
    }

    .shape-3 {
        background: radial-gradient(circle, #f4b400, #fcd253);
        width: 80px;
        height: 80px;
        top: 50%;
        left: -40px;
        transform: translateY(-50%);
    }

    .shape-4 {
        background: radial-gradient(circle, #f5d76e, #ffd700);
        width: 60px;
        height: 60px;
        bottom: 20%;
        right: -30px;
    }
    .shape-5 {
    background: radial-gradient(circle, #fcd253, #f4b400);
    width: 120px;
    height: 120px;
    top: 20%;
    right: -60px;
    animation-delay: 1.5s;
}

.shape-6 {
    background: radial-gradient(circle, #ffd700, #f5d76e);
    width: 90px;
    height: 90px;
    bottom: 10%;
    left: -45px;
    animation-delay: 2s;
}

.shape-7 {
    background: radial-gradient(circle, #f4b400, #fcd253);
    width: 70px;
    height: 70px;
    top: 75%;
    right: 10%;
    animation-delay: 1s;
}

.shape-8 {
    background: radial-gradient(circle, #f5d76e, #ffd700);
    width: 50px;
    height: 50px;
    bottom: 40%;
    left: 15%;
    animation-delay: 2.5s;
}

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
</style>
@endpush
