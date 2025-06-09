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

<header class="main-header bg-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="{{ __('messages.logo_alt') }}" class="logo-img h-12 w-auto"
                onerror="this.src='{{ asset('images/placeholder.jpg') }}'; console.log('Logo failed to load');">
        </a>

        <!-- Navigation -->
        <nav class="main-nav">
            <ul
                class="nav-list flex items-center space-x-6 {{ session('locale', config('app.locale')) == 'ar' ? 'flex-row-reverse space-x-reverse' : '' }}">
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                        class="nav-link flex items-center text-gray-700 hover:text-blue-600 transition-colors duration-300 {{ active_class(if_route('home')) }} {{ session('locale', config('app.locale')) == 'ar' ? 'flex-row-reverse' : '' }}">
                        <i
                            class="fas fa-home {{ session('locale', config('app.locale')) == 'ar' ? 'ml-3' : 'mr-2' }}"></i>
                        {{ __('messages.home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}"
                        class="nav-link flex items-center text-gray-700 hover:text-blue-600 transition-colors duration-300 {{ active_class(if_route('about')) }} {{ session('locale', config('app.locale')) == 'ar' ? 'flex-row-reverse' : '' }}">
                        <i
                            class="fas fa-info-circle {{ session('locale', config('app.locale')) == 'ar' ? 'ml-3' : 'mr-2' }}"></i>
                        {{ __('messages.about') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}"
                        class="nav-link flex items-center text-gray-700 hover:text-blue-600 transition-colors duration-300 {{ active_class(if_route('contact')) }} {{ session('locale', config('app.locale')) == 'ar' ? 'flex-row-reverse' : '' }}">
                        <i
                            class="fas fa-envelope {{ session('locale', config('app.locale')) == 'ar' ? 'ml-3' : 'mr-2' }}"></i>
                        {{ __('messages.contact') }}

                    </a>
                </li>
                <li class="nav-item">
                    <select
                        class="form-select changeLang bg-gray-100 border border-gray-300 rounded-md px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
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

<!-- Include Tailwind CSS and Font Awesome for icons -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    /* Ensure proper RTL styling */
    html[dir="rtl"] .main-header .nav-list {
        direction: rtl;
    }

    html[dir="rtl"] .nav-link {
        text-align: right;
    }

    /* Fix logo to the left */
    .logo {
        position: absolute;
        left: 1rem;
    }
</style>
