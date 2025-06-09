<footer class="main-footer">
    <div class="footer-container container">
        <div class="footer-grid">
            <div class="footer-section">
                <h4 class="footer-heading">{{ __('messages.quick_links') }}</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">{{ __('messages.registration') }}</a></li>
                    <li><a href="#">{{ __('messages.terms_of_service') }}</a></li>
                    <li><a href="#">{{ __('messages.privacy_policy') }}</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4 class="footer-heading">{{ __('messages.connect_with_us') }}</h4>
                <div class="social-links social-icons">
                    <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon" aria-label="GitHub"><i class="fab fa-github"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h4 class="footer-heading">{{ __('messages.contact_info') }}</h4>
                <p class="contact-info"><i class="fas fa-map-marker-alt"></i> {{ __('messages.address') }}</p>
                <p class="contact-info"><i class="fas fa-phone"></i> {{ __('messages.phone') }}</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="copyright">&copy; {{ __('messages.copyright') }}</p>
            <p class="credits">{{ __('messages.designed_with') }} <i class="fas fa-heart"></i>
                {{ __('messages.team_name') }}</p>
        </div>
    </div>
</footer>