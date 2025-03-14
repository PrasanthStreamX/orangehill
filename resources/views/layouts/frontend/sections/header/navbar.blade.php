<nav class="navbar navbar-expand-lg sticky-top fixed-top">
<div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="{{url('storage/images/orange-hill-logo.webp')}}" alt="Orange Hill Restaurant">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" aria-current="page" href="/menu">Menus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle {{ request()->is('catering/*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catering</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">On-Premises</a></li>
                    <li><a class="dropdown-item" href="#">Off-Premises</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('events') ? 'active' : '' }}" aria-current="page" href="#">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('gift-card') ? 'active' : '' }}" aria-current="page" href="#">Gift Card</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" aria-current="page" href="#">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn" aria-current="page" href="#">Reservations</a>
            </li>
        </ul>
    </div>
    </div>
</nav>