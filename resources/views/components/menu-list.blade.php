<li class="menu-item">
    <a href="{{ $link }}" class="menu-item-link {{ $link === Request::url() ? 'active' : '' }}">
        <span class="text-capitalize">
            <i class="{{ $class }} mr-1"></i>
            {{ $name }}
        </span>
        <span class="badge badge-pill bg-white shadow-sm text-primary">{{ $counter }}</span>
    </a>
</li>
