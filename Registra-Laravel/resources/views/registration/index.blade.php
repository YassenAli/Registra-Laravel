@extends('layouts.app')

@section('title', __('messages.registration'))

@section('content')
    <div class="content-wrapper">
        <main class="registration-main form-page-container">
            <div class="registration-container animate__animated animate__fadeIn form-wrapper">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
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

                <div class="form-header">
                    <h2>{{ __('messages.register') }}</h2>
                </div>

                <form id="registrationForm" action="{{ route('registration.submit') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group floating-label">
                            <label for="full_name">{{ __('messages.full_name') }}</label>
                            <input type="text" id="full_name" name="full_name"
                                class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name') }}"
                                required>
                            <div class="invalid-feedback" id="fullNameFeedback"></div>
                        </div>

                        <div class="form-group floating-label">
                            <label for="user_name">{{ __('messages.username') }}</label>
                            <input type="text" id="user_name" name="user_name"
                                class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}"
                                required>
                            <div class="invalid-feedback" id="usernameFeedback"></div>
                        </div>

                        <div class="form-group floating-label">
                            <label for="email">{{ __('messages.email_address') }}</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required>
                            <div class="invalid-feedback" id="emailFeedback"></div>
                        </div>

                        <div class="form-group floating-label">
                            <label for="phone">{{ __('messages.phone') }}</label>
                            <input type="text" id="phone" name="phone"
                                class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                required>
                            <div class="invalid-feedback" id="phoneFeedback"></div>
                        </div>

                        <div class="form-group floating-label">
                            <label for="whatsapp">{{ __('messages.whatsapp_number') }}</label>
                            <input type="text" id="whatsapp" name="whatsapp"
                                class="form-control @error('whatsapp') is-invalid @enderror" value="{{ old('whatsapp') }}"
                                required>
                            <button type="button" class="whatsapp-check" id="validateWhatsApp">
                                <i class="fab fa-whatsapp"></i> {{ __('messages.validate') }}
                            </button>
                            <div class="invalid-feedback" id="whatsAppFeedback"></div>
                            <small class="form-text text-muted">{{ __('messages.whatsapp_instructions') }}</small>
                        </div>

                        <div class="form-group floating-label">
                            <label for="address">{{ __('messages.address') }}</label>
                            <input type="text" id="address" name="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                                required>
                            <div class="invalid-feedback" id="addressFeedback"></div>
                        </div>

                        <div class="form-group floating-label">
                            <label for="password">{{ __('messages.password') }}</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required>
                            <div class="invalid-feedback" id="passwordFeedback"></div>
                        </div>

                        <div class="form-group floating-label">
                            <label for="password_confirmation">{{ __('messages.confirm_password') }}</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" required>
                            <div class="invalid-feedback" id="confirmPasswordFeedback"></div>
                        </div>

                        <div class="form-group file-upload">
                            <label class="upload-label">
                                <span class="upload-button"><i class="fas fa-cloud-upload-alt"></i>
                                    {{ __('messages.choose_profile_image') }}</span>
                                <span class="file-name"></span>
                                <input type="file" id="user_image" name="user_image" accept="image/*" required>
                                <div class="invalid-feedback" id="imageFeedback"></div>
                            </label>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-btn" id="submitBtn">
                            <i class="fas fa-user-plus"></i> {{ __('messages.register') }}
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <div id="notificationToast" class="toast"></div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('registrationForm');
            const fields = {
                full_name: { pattern: /^[a-zA-Z\s]{3,}$/, message: '{{ __("messages.full_name_validation") }}' },
                user_name: { pattern: /^[a-zA-Z0-9_]{3,}$/, message: '{{ __("messages.username_validation") }}' },
                email: { pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, message: '{{ __("messages.email_validation") }}' },
                phone: { pattern: /^\d{10}$/, message: '{{ __("messages.phone_validation") }}' },
                whatsapp: { pattern: /^[1-9]\d{7,14}$/, message: '{{ __("messages.whatsapp_validation") }}' },
                address: { pattern: /.{5,}/, message: '{{ __("messages.address_validation") }}' },
                password: {
                    pattern: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/,
                    message: '{{ __("messages.password_validation") }}'
                },
                password_confirmation: { pattern: null, message: '{{ __("messages.confirm_password_validation") }}' },
                user_image: { pattern: null, message: '{{ __("messages.image_required") }}' }
            };

            // Real-time Full Name Validation
            document.getElementById('full_name').addEventListener('blur', async function () {
                const fullName = this.value.trim();
                const feedback = document.getElementById('fullNameFeedback');

                if (!fields.full_name.pattern.test(fullName)) {
                    showValidation(feedback, fields.full_name.message, false);
                    return;
                }
            });

            // Real-time Username Validation
            document.getElementById('user_name').addEventListener('blur', async function () {
                const username = this.value.trim();
                const feedback = document.getElementById('usernameFeedback');

                if (!fields.user_name.pattern.test(username)) {
                    showValidation(feedback, fields.user_name.message, false);
                    return;
                }

                try {
                    const response = await fetch('/check-username', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ username: username })
                    });

                    const data = await response.json();
                    showValidation(feedback, data.message, data.valid);
                } catch (error) {
                    showValidation(feedback, '{{ __("messages.validation_service_unavailable") }}', false);
                }
            });

            // Real-time Email Validation
            document.getElementById('email').addEventListener('blur', async function () {
                const email = this.value.trim();
                const feedback = document.getElementById('emailFeedback');

                if (!fields.email.pattern.test(email)) {
                    showValidation(feedback, fields.email.message, false);
                    return;
                }

                try {
                    const response = await fetch('/check-email', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ email: email })
                    });

                    const data = await response.json();
                    showValidation(feedback, data.message, data.valid);
                } catch (error) {
                    showValidation(feedback, '{{ __("messages.validation_service_unavailable") }}', false);
                }
            });

            // Real-time Field Validation
            Object.entries(fields).forEach(([fieldId, config]) => {
                const input = document.getElementById(fieldId);
                if (!input) return;

                input.addEventListener('blur', function () {
                    const value = this.value.trim();
                    const feedback = document.getElementById(`${fieldId}Feedback`);

                    if (fieldId === 'password_confirmation') {
                        const password = document.getElementById('password').value;
                        validateConfirmPassword(password, value);
                    } else if (config.pattern && !config.pattern.test(value)) {
                        showValidation(feedback, config.message, false);
                    } else {
                        showValidation(feedback, '', true);
                    }
                });
            });

            function validateConfirmPassword(password, confirmPassword) {
                const feedback = document.getElementById('confirmPasswordFeedback');
                if (password !== confirmPassword) {
                    showValidation(feedback, '{{ __("messages.confirm_password_validation") }}', false);
                    return false;
                }
                showValidation(feedback, '', true);
                return true;
            }

            // WhatsApp Validation
            document.getElementById('validateWhatsApp').addEventListener('click', async function (e) {
                e.preventDefault();
                const whatsappInput = document.getElementById('whatsapp');
                const feedback = document.getElementById('whatsAppFeedback');
                const number = whatsappInput.value.trim();

                if (!fields.whatsapp.pattern.test(number)) {
                    showValidation(feedback, fields.whatsapp.message, false);
                    return;
                }

                try {
                    feedback.textContent = '{{ __("messages.validating") }}';
                    feedback.style.color = '#666';

                    const response = await fetch('/validate-whatsapp', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ number: number })
                    });

                    const data = await response.json();
                    if (data.valid) {
                        showValidation(feedback, '✓ {{ __("messages.valid_whatsapp") }}', true);
                    } else {
                        showValidation(feedback, data.message || '{{ __("messages.invalid_whatsapp") }}', false);
                        this.classList.add('invalid');
                        setTimeout(() => {
                            this.classList.remove('invalid');
                        }, 500);
                    }
                } catch (error) {
                    showValidation(feedback, '{{ __("messages.validation_service_unavailable") }}', false);
                }
            });

            // Form Submission Handler
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                let isValid = true;

                // Clear previous validations
                document.querySelectorAll('.invalid-feedback').forEach(el => {
                    el.textContent = '';
                    const input = el.previousElementSibling;
                    if (input) input.classList.remove('is-invalid', 'is-valid');
                });

                // Validate all fields
                Object.entries(fields).forEach(([fieldId, config]) => {
                    const input = document.getElementById(fieldId);
                    const feedback = document.getElementById(`${fieldId}Feedback`);
                    const value = input.value.trim();

                    if (fieldId === 'password_confirmation') {
                        const password = document.getElementById('password').value;
                        if (password !== value) {
                            showValidation(feedback, '{{ __("messages.confirm_password_validation") }}', false);
                            isValid = false;
                        }
                    } else if (input.required && !value) {
                        showValidation(feedback, '{{ __("messages.required_field") }}', false);
                        isValid = false;
                    } else if (config.pattern && !config.pattern.test(value)) {
                        showValidation(feedback, config.message, false);
                        isValid = false;
                    }
                });

                const fileInput = document.getElementById('user_image');
                const fileFeedback = document.getElementById('imageFeedback');
                if (!fileInput.files[0]) {
                    showValidation(fileFeedback, '{{ __("messages.image_required") }}', false);
                    isValid = false;
                }

                if (!isValid) return;

                const submitBtn = document.getElementById('submitBtn');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> {{ __("messages.processing") }}';

                try {
                    const formData = new FormData(form);
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData
                    });

                    if (response.redirected) {
                        window.location.href = response.url;
                        return;
                    }

                    const data = await response.json();
                    if (data.success) {
                        window.location.href = data.redirect;
                    } else {
                        Object.entries(data.errors || {}).forEach(([field, message]) => {
                            const feedback = document.getElementById(`${field}Feedback`);
                            if (feedback) showValidation(feedback, message, false);
                        });
                        if (data.message) showToast(data.message, 'error');
                    }
                } catch (error) {
                    showToast('{{ __("messages.network_error") }}', 'error');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fas fa-user-plus"></i> {{ __("messages.register") }}';
                }
            });

            function showValidation(element, message, valid) {
                if (!element) return;
                element.textContent = message;
                if (valid) {
                    element.style.color = 'green';
                    if (element.previousElementSibling) {
                        element.previousElementSibling.classList.remove('is-invalid');
                        element.previousElementSibling.classList.add('is-valid');
                    }
                } else {
                    element.style.color = 'red';
                    if (element.previousElementSibling) {
                        element.previousElementSibling.classList.remove('is-valid');
                        element.previousElementSibling.classList.add('is-invalid');
                    }
                }
            }

            function showToast(message, type = 'info') {
                const toast = document.getElementById('notificationToast');
                toast.textContent = message;
                toast.className = `toast toast-${type}`;
                toast.style.display = 'block';
                setTimeout(() => {
                    toast.style.display = 'none';
                }, 4000);
            }
        });
    </script>
@endpush