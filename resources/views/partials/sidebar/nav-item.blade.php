<li class="nav-item">
    <a class="nav-link {{ (\Request::route()->getName() === $routeName) ? 'active': '' }}"
        href="{{ route($routeName) }}">
        <i class="{{ $icon }} {{ $color }}"></i>
        <span class="nav-link-text">{{ $label }}</span>
    </a>
</li>