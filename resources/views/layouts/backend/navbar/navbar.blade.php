<div class="sidebar">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item">
            <a class="nav-link" href="/admin">
                <i class="menu-icon tf-icons fa fa-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        @foreach (app('menu')->getItems() as $item)
            <li class="nav-item @if (request()->url() == url($item['link'])) active @endif">
                <a href="{{ url($item['link']) }}"
                    class="nav-link @isset($item['children']) menu-toggle @endisset">
                    <i class="menu-icon tf-icons {{ $item['icon'] }}"></i>
                    <div data-i18n="{{ $item['title'] }}">{{ $item['title'] }}</div>
                </a>
                @isset($item['children'])
                    <ul class="nav-sub">
                        @foreach ($item['children'] as $child)
                            <li class="nav-item @if (request()->url() == url($child['link'])) active @endif">
                                <a href="{{ url($child['link']) }}" class="nav-link">
                                    <div data-i18n="{{ $child['title'] }}">{{ $child['title'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endisset
            </li>
        @endforeach
    </ul>
</div>
