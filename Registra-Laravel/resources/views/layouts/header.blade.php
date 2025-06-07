<header class="main-header">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Registra Logo" class="logo-img">
        </a>

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
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link {{ active_class(if_route('about')) }}">
                        <i class="fas fa-info-circle"></i> {{ __('messages.nav.about') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link {{ active_class(if_route('contact')) }}">
                        <i class="fas fa-envelope"></i> {{ __('messages.nav.contact') }}
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
