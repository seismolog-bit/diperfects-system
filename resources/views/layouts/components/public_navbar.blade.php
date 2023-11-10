<div class="main-menu menu-style-2">
    <nav class="tp-main-menu-content">
        <ul>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li class="has-dropdown">
                <a href="{{route('product.index')}}">Produk</a>
                <ul class="tp-submenu">
                    @foreach ($categories as $category)
                        <li><a href="{{route('product.index', ['category' => $category->slug])}}">{{$category->nama}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="contact.html">Tentang Kami</a></li>
            <li><a href="contact.html">Kontak</a></li>
        </ul>
    </nav>
</div>
