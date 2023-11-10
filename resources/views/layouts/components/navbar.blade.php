<div class="navbar-vertical-content">
    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
        <!-- Collapse -->
        <div class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}"
                data-placement="left">
                <i class="bi-house-door nav-icon"></i>
                <span class="nav-link-title">Dashboard</span>
            </a>
        </div>

        <span class="dropdown-header mt-4">General</span>
        <small class="bi-three-dots nav-subtitle-replacer"></small>

        <div class="nav-item">
            <a class="nav-link dropdown-toggle {{ request()->routeIs(['admin.product.*', 'admin.kategori.*']) ? 'active' : '' }}"
                href="#navbarVerticalMenuProducts" role="button" data-bs-toggle="collapse"
                data-bs-target="#navbarVerticalMenuProducts"
                aria-expanded="{{ request()->routeIs(['admin.product.*', 'admin.kategori.*']) ? 'true' : '' }}"
                aria-controls="navbarVerticalMenuProducts">
                <i class="bi-basket nav-icon"></i>
                <span class="nav-link-title">Produk</span>
            </a>

            <div id="navbarVerticalMenuProducts"
                class="nav-collapse collapse {{ request()->routeIs(['admin.product.*', 'admin.kategori.*', 'admin.feature.*']) ? 'show' : '' }}"
                data-bs-parent="#navbarVerticalMenu">
                <a class="nav-link {{ request()->routeIs('admin.product.index') ? 'active' : '' }}"
                    href="{{ route('admin.product.index') }}">Daftar Produk</a>
                <a class="nav-link {{ request()->routeIs('admin.product.create') ? 'active' : '' }}"
                    href="{{ route('admin.product.create') }}">Tambah Produk</a>
                <a class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}"
                    href="{{ route('admin.kategori.index') }}">Kategori</a>
                    <a class="nav-link {{ request()->routeIs('admin.feature.*') ? 'active' : '' }}"
                        href="{{ route('admin.feature.index') }}">Feature</a>
            </div>
        </div>

        <div class="nav-item">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.order.create') ? 'active' : '' }}"
                href="#navbarVerticalMenuOrders" role="button" data-bs-toggle="collapse"
                data-bs-target="#navbarVerticalMenuOrders"
                aria-expanded="{{ request()->routeIs('admin.product.create') ? 'true' : '' }}"
                aria-controls="navbarVerticalMenuOrders">
                <i class="bi-receipt nav-icon"></i>
                <span class="nav-link-title">Pesanan</span>
            </a>

            <div id="navbarVerticalMenuOrders"
                class="nav-collapse collapse {{ request()->routeIs('admin.order.*') ? 'show' : '' }}"
                data-bs-parent="#navbarVerticalMenu">
                <a class="nav-link" href="{{ route('admin.order.index') }}">Daftar Pesanan</a>
                <a class="nav-link" href="{{ route('admin.order.create') }}">Tambah Pesanan</a>
            </div>
        </div>
        <div class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.order_membership.*') ? 'active' : '' }}"
                href="{{ route('admin.order_membership.index') }}" data-placement="left">
                <i class="bi-bag-check nav-icon"></i>
                <span class="nav-link-title">Pesanan Membership</span>
            </a>
        </div>

        <span class="dropdown-header mt-4">Laporan</span>
        <small class="bi-three-dots nav-subtitle-replacer"></small>
        <div class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.report.index') ? 'active' : '' }}"
                href="{{ route('admin.report.index') }}" data-placement="left">
                <i class="bi-file-earmark-spreadsheet nav-icon"></i>
                <span class="nav-link-title">Transaksi</span>
            </a>
        </div>
        <div class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.report.finance') ? 'active' : '' }}"
                href="{{ route('admin.report.finance') }}" data-placement="left">
                <i class="bi-credit-card nav-icon"></i>
                <span class="nav-link-title">Keuangan</span>
            </a>
        </div>

        <span class="dropdown-header mt-4">User</span>
        <small class="bi-three-dots nav-subtitle-replacer"></small>

        <div class="nav-item">
            <a class="nav-link dropdown-toggle {{ request()->routeIs(['admin.membership.*', 'admin.member-type.*']) ? 'active' : '' }}"
                href="#navbarVerticalMenuMemberships" role="button" data-bs-toggle="collapse"
                data-bs-target="#navbarVerticalMenuMemberships"
                aria-expanded="{{ request()->routeIs(['admin.membership.*', 'admin.member-type.*']) ? 'true' : '' }}"
                aria-controls="navbarVerticalMenuMemberships">
                <i class="bi-person-badge nav-icon"></i>
                <span class="nav-link-title">Membership</span>
            </a>

            <div id="navbarVerticalMenuMemberships"
                class="nav-collapse collapse {{ request()->routeIs(['admin.membership.*', 'admin.member-type.*']) ? 'show' : '' }}"
                data-bs-parent="#navbarVerticalMenu">
                <a class="nav-link {{ request()->routeIs('admin.membership.*') ? 'active' : '' }}"
                    href="{{ route('admin.membership.index') }}">Daftar Membership</a>
                <a class="nav-link {{ request()->routeIs('admin.member-type.index') ? 'active' : '' }}"
                    href="{{ route('admin.member-type.index') }}">Tipe Membership</a>
            </div>
        </div>

        <div class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}"
                href="{{ route('admin.user.index') }}" data-placement="left">
                <i class="bi-people nav-icon"></i>
                <span class="nav-link-title">User</span>
            </a>
        </div>
    </div>

</div>
