<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('home') }}">
            <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt"></i>
            Dashboard
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ request()->is('employees/*') ? 'c-active' : '' }}"
            href="{{ route('employees.index') }}">
            <i class="c-sidebar-nav-icon fas fa-fw fa-address-card"></i>
            Employees
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ request()->is('products/*') ? 'c-active' : '' }}"
            href="{{ route('products.index') }}">
            <i class="c-sidebar-nav-icon fas fa-fw fa-copy"></i>
            Products
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ request()->is('suppliers/*') ? 'c-active' : '' }}"
            href="{{ route('suppliers.index') }}">
            <i class="c-sidebar-nav-icon fas fa-fw fa-suppliers"></i>
            Suppliers
        </a>
    </li>
    <li class="c-sidebar-nav-divider"></li>
    <li class="c-sidebar-nav-item mt-auto"></li>
    <li class="c-sidebar-nav-item"><a href="#" class="c-sidebar-nav-link"
            onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
            Logout</a>
    </li>
</ul>
