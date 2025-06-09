<<<<<<< Updated upstream
<header class="main-header">
    <div class="container">
=======
<header class="header">
    <div class="container">
        <!-- Logo -->
>>>>>>> Stashed changes
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Registra Logo" class="logo-img">
        </a>

<<<<<<< Updated upstream
       <form method="POST" action="{{ route('change.language') }}" class="language-switcher">
    @csrf
    <select name="locale" onchange="this.form.submit()" class="language-select">
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
        <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
    </select>
</form>


        <nav class="main-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ active_class(if_route('home')) }}">
                        <i class="fas fa-home"></i> {{ __('messages.nav.home') }}
=======
        <!-- Navigation -->
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ active_class(if_route('home')) }}">
                        <i class="fas fa-home"></i> {{ __('messages.home') }}
>>>>>>> Stashed changes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link {{ active_class(if_route('about')) }}">
<<<<<<< Updated upstream
                        <i class="fas fa-info-circle"></i> {{ __('messages.nav.about') }}
=======
                        <i class="fas fa-info-circle"></i> {{ __('messages.about') }}
>>>>>>> Stashed changes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link {{ active_class(if_route('contact')) }}">
<<<<<<< Updated upstream
                        <i class="fas fa-envelope"></i> {{ __('messages.nav.contact') }}
=======
                        <i class="fas fa-envelope"></i> {{ __('messages.contact') }}
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
<style>
    .nav-link {
    color: var(--text-on-dark); /* لون النص أبيض أو حسب متغيرك */
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
    margin-right: 40px; /* أو القيمة اللي تناسبك */
}


</style>
>>>>>>> Stashed changes
