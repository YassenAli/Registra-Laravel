<footer class="main-footer">
    <div class="footer-container container">
        <div class="footer-grid">
            <!-- Add localized content using __() helper -->
            <div class="footer-section">
                <h4 class="footer-heading">{{ __('Quick Links') }}</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">{{ __('Registration') }}</a></li>
                    <li><a href="#">{{ __('Terms of Service') }}</a></li>
                    <li><a href="#">{{ __('Privacy Policy') }}</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4 class="footer-heading">{{ __('Connect With Us') }}</h4>
                <div class="social-links social-icons">
                    <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon" aria-label="GitHub"><i class="fab fa-github"></i></a>
                        </div>
                </div>

                <div class="footer-section">
                    <h4 class="footer-heading">{{ __('Contact Info') }}</h4>
                    <p class="contact-info"><i class="fas fa-map-marker-alt"></i> {{ __('شارع أحمد زويل، الدقي، قسم الدقي، محافظة الجيزة') }}</p>
                    <p class="contact-info"><i class="fas fa-phone"></i> {{ __('+1 (555) 123-4567') }}</p>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="copyright">&copy; {{ __('2025 Registra. All rights reserved.') }}</p>
                <p class="credits">{{ __('Designed with') }} <i class="fas fa-heart"></i> {{ __(' Registra Team') }}</p>
            </div>

        </div>
    </div>
</footer>