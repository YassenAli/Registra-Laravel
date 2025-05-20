document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registrationForm');
    const fields = {
        full_name: { pattern: /^[a-zA-Z\s]{3,}$/, message: 'At least 3 letters' },
        user_name: { pattern: /^[a-zA-Z0-9_]{3,}$/, message: '3+ chars (letters, numbers, _)' },
        email: { pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, message: 'Invalid email format' },
        phone: { pattern: /^\d{10}$/, message: '10 digits required' },
        // pattern for whatsapp: [1-9]\d{7,14}$
        whatsapp: { pattern: /^\d{7,14}$/, message: 'not valid format whatsApp number' },
        address: { pattern: /.{5,}/, message: 'At least 5 characters' },
        password: { pattern: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/,
                message: '8+ chars with number & special' },
        confirm_password: { pattern: null, message: 'Passwords do not match' },
        user_image: { pattern: null, message: 'Profile image required' }
    };

    // Real-time Username Validation
    document.getElementById('user_name').addEventListener('blur', async function() {
        const username = this.value.trim();
        const feedback = document.getElementById('usernameFeedback');

        if (!fields.user_name.pattern.test(username)) {
            showValidation(feedback, 'Invalid username format', false);
            return;
        }

        try {
            const response = await fetch('DB_Ops.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `action=check_username&username=${encodeURIComponent(username)}`
            });

            const data = await response.json();
            showValidation(feedback, data.message, data.valid);
        } catch (error) {
            showValidation(feedback, 'Validation service unavailable', false);
        }
    });

    // Real-time Field Validation
    Object.entries(fields).forEach(([fieldId, config]) => {
        const input = document.getElementById(fieldId);
        if (!input) return;

        input.addEventListener('blur', function() {
            const value = this.value.trim();
            const feedback = this.parentElement.querySelector('.invalid-feedback');

            if (fieldId === 'confirm_password') {
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
        const feedback = document.getElementById('passwordError');
        if (password !== confirmPassword) {
            showValidation(feedback, 'Passwords do not match', false);
            return false;
        }
        showValidation(feedback, '', true);
        return true;
    }

    document.getElementById('email').addEventListener('blur', async function() {
    const email = this.value.trim();
    const feedback = document.getElementById('emailFeedback');

    if (!fields.email.pattern.test(email)) {
        showValidation(feedback, 'Invalid email format', false);
        return;
    }

    try {
        const response = await fetch('DB_Ops.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=check_email&email=${encodeURIComponent(email)}`
        });

        const data = await response.json();
        showValidation(feedback, data.message, data.valid);
    } catch (error) {
        showValidation(feedback, 'Validation service unavailable', false);
    }
    });

    // WhatsApp Validation Handler
    document.getElementById('validateWhatsApp').addEventListener('click', async () => {
        const whatsappInput = document.getElementById('whatsapp');
        const feedback = document.getElementById('whatsAppFeedback');
        const number = whatsappInput.value.trim();


        feedback.textContent = 'Validating...';
        feedback.style.color = '#666';

        try {
            const response = await fetch('API_Ops.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=validate_whatsapp&number=${encodeURIComponent(number)}`
            });

            const data = await response.json();
            // showValidationWhatsApp(feedback, data.message, data.valid);
            if (data.valid) {
                showValidation(feedback, '✓ Valid WhatsApp number', true);
            } else {
                showValidation(feedback, data.message || 'Invalid WhatsApp number', false);
                const button = document.getElementById('validateWhatsApp');
                button.classList.add('invalid');
                setTimeout(() => {
                    button.classList.remove('invalid');
                }, 500);
            }
        } catch (error) {
            showValidationWhatsApp(feedback, 'Validation service unavailable', false);
        }
    });

    // Form Submission Handler
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        let isValid = true;

        document.querySelectorAll('.invalid-feedback').forEach(el => {
        el.textContent = '';
        el.previousElementSibling.style.borderColor = '';
        });

        // Validate all fields
        Object.entries(fields).forEach(([fieldId, config]) => {
            const input = document.getElementById(fieldId);
            const feedback = input.parentElement.querySelector('.invalid-feedback');
            const value = input.value.trim();

            if (fieldId === 'confirm_password') {
                const password = document.getElementById('password').value;
                if (password !== value) {
                    showValidation(feedback, 'Passwords do not match', false);
                    isValid = false;
                }
            } else if (input.required && !value) {
                showValidation(feedback, 'This field is required', false);
                isValid = false;
            } else if (config.pattern && !config.pattern.test(value)) {
                showValidation(feedback, config.message, false);
                isValid = false;
            }
        });

        const fileInput = document.getElementById('user_image');
        const fileFeedback = fileInput.parentElement.querySelector('.invalid-feedback');
        if (!fileInput.files[0]) {
            showValidation(fileFeedback, 'Profile image is required', false);
            isValid = false;
        }

        if (!isValid) return;

        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
        const minProcessingTime = new Promise(resolve => setTimeout(resolve, 2000));
        await minProcessingTime;

        try {
            const formData = new FormData(form);
            formData.append('action', 'register');
            const response = await fetch('DB_Ops.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();
            if (data.success) {
                window.location.href = data.redirect;
            } else {
                Object.entries(data.errors || {}).forEach(([field, message]) => {
                    const feedback = document.getElementById(`${field}Feedback`) ||
                                document.getElementById(`${field}Error`);
                    if (feedback) showValidation(feedback, message, false);
                });
                if (data.message) showToast(data.message, 'error');
            }
        } catch (error) {
            showToast('Network error - please try again', 'error');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-user-plus"></i> Register';
        }
    });

    function showValidation(element, message, isValid) {
        if (!element) return;
        element.textContent = message;
        element.style.color = isValid ? '#28a745' : '#dc3545';
        element.previousElementSibling.style.borderColor = isValid ? '#28a745' : '#dc3545';
    }

    function showValidationWhatsApp(element, message, isValid) {
        if (!element) return;
        element.textContent = message;
        element.style.color = isValid ? '#28a745' : '#dc3545';
        element.previousElementSibling.previousElementSibling.style.borderColor = isValid ? '#28a745' : '#dc3545';
    }

    function showToast(message, type = 'success') {
        const toast = document.getElementById('notificationToast');
        toast.textContent = message;
        toast.className = `toast ${type} show`;
        setTimeout(() => toast.classList.remove('show'), 3000);
    }
});