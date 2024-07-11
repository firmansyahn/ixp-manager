{{-- Override this file (via skinning) to add customer staff links for ADMINs --}}
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle center-dd-caret d-flex"
        href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Staff Link
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ config('social.github.url') }}">
            {{ config('social.github.label') }}
        </a>
    </div>
</li>