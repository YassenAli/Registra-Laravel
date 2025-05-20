@extends('layouts.app')

@section('title', __('Registration'))

@section('content')
<div class="content-wrapper">

<main class="registration-main form-page-container">
<div class="registration-container animate__animated animate__fadeIn form-wrapper">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="form-header">
            <h2>Register</h2>
    </div>

    <form id="registrationForm" action="{{ route('registration.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-grid">
        <!-- Form fields with localization -->
        <div class="form-group floating-label">
            <label for="full_name">{{ __('Full Name') }}</label>
            <input type="text" id="full_name" name="full_name" class="form-control" required>
            <div class="invalid-feedback" id="fullnameFeedback"></div>
        </div>

        <div class="form-group floating-label">
            <label for="user_name">{{ __('Username') }}</label>
            <input type="text" id="user_name" name="user_name" class="form-control" required
                pattern="[a-zA-Z0-9_]{3,}">
            <div class="invalid-feedback" id="usernameFeedback"></div>
        </div>

        <div class="form-group floating-label">
            <label for="email">{{ __('Email Address') }}</label>
            <input type="email" id="email" name="email" class="form-control" required>
            <div class="invalid-feedback" id="emailFeedback"></div>
            <div class="invalid-feedback" id="emailFeedback"></div>
        </div>

        <div class="form-group floating-label">
            <label for="phone">{{ __('Phone') }}</label>
            <input type="text" id="phone" name="phone" class="form-control" required pattern="[0-9]{10}">
            <div class="invalid-feedback" id="phoneFeedback"></div>
        </div>

        <div class="form-group floating-label">
            <label for="whatsapp">{{ __('WhatsApp Number') }}</label>
            <input type="text" id="whatsapp" name="whatsapp" class="form-control"
                    pattern="^[1-9]\d{7,14}$" required title="Include country code (e.g. 20 for Egypt)">
            <button type="button" class="whatsapp-check" id="validateWhatsApp">
                <i class="fab fa-whatsapp"></i> {{ __('Validate') }}
            </button>
            <small class="form-text text-muted">Must include country code (e.g. 20 for Egypt, 1 for USA/Canada)</small>
            <div class="invalid-feedback" id="whatsAppFeedback"></div>
        </div>

        <div class="form-group floating-label">
            <label for="address">{{ __('Address') }}</label>
            <input type="text" id="address" name="address" class="form-control" required>
            <div class="invalid-feedback" id="addressFeedback"></div>
        </div>

        <div class="form-group floating-label">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" id="password" name="password" class="form-control" required
                pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$">
            <div class="password-strength">
                <div class="strength-bar"></div>
                <span class="strength-text"></span>
            </div>
            <div class="invalid-feedback" id="confirmFeedback"></div>
        </div>

        <div class="form-group floating-label">
            <label for="confirm_password">{{ __('Confirm Password') }}</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
            <div class="invalid-feedback" id="confirmPasswordFeedback"></div>
        </div>

        <div class="form-group file-upload">
            <label class="upload-label">
                <span class="upload-button"><i class="fas fa-cloud-upload-alt"></i> {{ __('Choose Profile Image') }}</span>
                <span class="file-name"></span>
                <input type="file" id="user_image" name="user_image" accept="image/*" required>
                <div class="invalid-feedback" id="userImageFeedback"></div>
            </label>
        </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-btn" id="submitBtn">
                <i class="fas fa-user-plus"></i> {{ __('Register') }}
            </button>
        </div>
    </form>
</div>
</main>
</div>
@endsection