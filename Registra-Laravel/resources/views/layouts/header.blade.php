<header class="header">
    <div class="container">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Registra Logo" class="logo-img">
        </a>

        <!-- Navigation -->
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ active_class(if_route('home')) }}">
                        <i class="fas fa-home"></i> {{ __('messages.home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link {{ active_class(if_route('about')) }}">
                        <i class="fas fa-info-circle"></i> {{ __('messages.about') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link {{ active_class(if_route('contact')) }}">
                        <i class="fas fa-envelope"></i> {{ __('messages.contact') }}
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Language Selector -->
        <form class="language-switcher" onsubmit="return false;">
            <select
                class="language-select"
                onchange="window.location.href=this.value"
                dir="{{ session('locale', config('app.locale')) == 'ar' ? 'rtl' : 'ltr' }}">

                <?php
                $locales = config('app.available_locales', ['en', 'ar']);
                $currentLocale = session('locale', config('app.locale'));
                foreach ($locales as $locale) {
                    $selected = ($currentLocale == $locale) ? 'selected' : '';
                    $label = ($locale == 'en') ? 'English' : 'العربية';
                    $url = route('change_lang') . '?locale=' . $locale;
                    echo "<option value=\"$url\" $selected>$label</option>";
                }
                ?>
            </select>
        </form>
    </div>
</header>
<style>
    .nav-link {
    color: var(--text-on-dark);
    font-weight: 500;
    font-size: 1.05em;
    display: flex;
    align-items: center;
    padding: 0.3rem 0;
    position: relative;
    transition: color 0.3s ease, opacity 0.3s ease;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}

.nav-link i {
    margin-right: 5px;
    font-size: 1.2em;
    color: var(--text-on-dark);
    opacity: 0.8;
    transition: color 0.3s ease, opacity 0.3s ease;
}

.nav-link:hover {
    color: var(--text-on-dark-brighter);
    opacity: 1;
}

.nav-link:hover i {
    color: var(--text-on-dark-brighter);
    opacity: 1;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: var(--gold-color);
    opacity: 0.8;
    transition: width 0.3s ease, opacity 0.3s ease;
}

.nav-link:hover::after {
    width: 100%;
    opacity: 1;
}

.nav-list li.nav-item:last-child {
    margin-right: 40px;
}

</style>