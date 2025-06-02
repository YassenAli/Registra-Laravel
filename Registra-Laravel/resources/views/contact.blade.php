@extends('layouts.app')

@section('title', __('Contact Us'))

@section('content')
<main class="contact-container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
        <h2>{{ __('Contact Us') }}</h2>
        <p>{{ __('Have any questions? Reach out to us!') }}</p>

        <div class="contact-details">
            <p><i class="fas fa-map-marker-alt"></i> {{ __('Address: 123 Registra Street, City, Country') }}</p>
            <p><i class="fas fa-phone"></i> {{ __('Phone: +123 456 7890') }}</p>
            <p><i class="fas fa-envelope"></i> {{ __('Email: contact@registra.com') }}</p>
        </div>
    </section>

    <section class="contact-form">
        <h3>{{ __('Send Us a Message') }}</h3>
        <form action="{{ route('contact.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="{{ __('Your Name') }}" required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="{{ __('Your Email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="message" placeholder="{{ __('Your Message') }}" required></textarea>
                @error('message')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="submit-btn">
                <i class="fas fa-paper-plane"></i> {{ __('Send Message') }}
            </button>
        </form>
    </section>

    <section class="contact-map">
        <h3>{{ __('Find Us') }}</h3>
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
    .alert {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 5px;
        width: 100%;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert ul {
        margin: 0;
        padding-left: 1.5rem;
    }

    .contact-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .contact-info, .contact-form, .contact-map {
        background: #ffffff;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .contact-info h2, .contact-form h3, .contact-map h3 {
        color: #333;
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
        color: #666;
    }

    .contact-details i {
        color: #4a90e2;
        font-size: 1.2rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-group textarea {
        min-height: 150px;
        resize: vertical;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #4a90e2;
        outline: none;
    }

    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }

    .submit-btn {
        background: linear-gradient(45deg, #4a90e2, #67b26f);
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
    }

    .map-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .contact-container {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush
