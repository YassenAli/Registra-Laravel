<header class="main-header">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/malak.jpg') }}" alt="Registra Logo" class="logo-img">
        </a>

        <nav class="main-nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link {{ active_class(if_route('home')) }}"><i class="fas fa-home"></i> {{ __('Home') }}</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link {{ active_class(if_route('about')) }}"><i class="fas fa-info-circle"></i> {{ __('About') }}</a></li>
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link {{ active_class(if_route('contact')) }}"><i class="fas fa-envelope"></i> {{ __('Contact') }}</a></li>
            </ul>
        </nav>
    </div>
</header>