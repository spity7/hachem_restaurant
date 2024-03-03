<ul class="c-header-nav ml-auto mr-4">
    <li class="c-header-nav-item dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">
            <div class="c-avatar">
                <i class="far fa-user"></i>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">
            <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
            <a class="dropdown-item" href="{{ route('profile.index') }}">
                <i class="c-icon fas fa-fw fa-id-card mr-2"></i>
                Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-icon fas fa-fw fa-sign-out-alt mr-2"></i>
                Logout</a>
        </div>
    </li>
</ul>
