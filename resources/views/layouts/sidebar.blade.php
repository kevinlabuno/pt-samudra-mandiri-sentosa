<div class="sidebar">
    <ul class="menu">

        <!-- Menu Beranda -->
        <li class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
            <a href="{{ route('beranda') }}">Beranda</a>
        </li>

        @php
            $isAdmin = auth()->check() && auth()->user()->role === 'Admin';
            $showPackaging = $isAdmin || (auth()->check() && in_array(auth()->user()->role, ['Manager Produksi', 'Gudang']));
            $showKontainer = $isAdmin || (auth()->check() && auth()->user()->role === 'Manager Produksi');
            $showKarton = $isAdmin || (auth()->check() && auth()->user()->role === 'Manager Produksi');
            $showKaleng = $isAdmin || (auth()->check() && auth()->user()->role === 'Manager Produksi');
            $showIkan = $isAdmin || (auth()->check() && in_array(auth()->user()->role, ['Manager Produksi', 'Gudang']));
            $showTenaga = $isAdmin || (auth()->check() && auth()->user()->role === 'Manager Produksi');
            $showBom = $isAdmin || (auth()->check() && in_array(auth()->user()->role, ['Manager Produksi', 'Gudang']));
            $showMesin = $isAdmin || (auth()->check() && in_array(auth()->user()->role, ['Manager Produksi', 'Gudang']));
            $showInventaris = $isAdmin || (auth()->check() && in_array(auth()->user()->role, ['Manager Produksi', 'General Manager']));
            $showUsers = $isAdmin || (auth()->check() && in_array(auth()->user()->role, ['Manager Produksi', 'General Manager']));
        @endphp

        @if ($showPackaging)
            <p style="padding-left:20px;color:#5a5c5e86;padding: 10px 20px;margin: 10px 15px;border-radius:8px"><b>Packaging Materials</b></p>
        @endif

        @if ($showKontainer)
            <li class="submenu {{ request()->routeIs('kontainer.index') ? 'active' : '' }}">
                <a href="{{ route('kontainer.index') }}">Kontainer</a>
            </li>
        @endif

        @if ($showKarton)
            <li class="submenu {{ request()->routeIs('kartons.index') ? 'active' : '' }}">
                <a href="{{ route('kartons.index') }}">Karton</a>
            </li>
        @endif

        @if ($showKaleng)
            <li class="submenu {{ request()->routeIs('kalengs.index') ? 'active' : '' }}">
                <a href="{{ route('kalengs.index') }}">Kaleng</a>
            </li>
        @endif

        @if ($showIkan)
            <li class="{{ request()->routeIs('ikans') ? 'active' : '' }}">
                <a href="{{ route('ikans') }}">Ikan</a>
            </li>
        @endif

        @if ($showTenaga)
            <li class="{{ request()->routeIs('tenagas.index') ? 'active' : '' }}">
                <a href="{{ route('tenagas.index') }}">Tenaga Kerja</a>
            </li>
        @endif

        @if ($showBom)
            <p style="padding-left:20px;color:#5a5c5e86;padding: 10px 20px;margin: 10px 15px;border-radius:8px"><b>Item dan Bill of Materials (BOM)</b></p>
            <li class="submenu {{ request()->routeIs('items.index') ? 'active' : '' }}">
                <a href="{{ route('items.index') }}">Item</a>
            </li>
            <li class="submenu {{ request()->routeIs('boms.index') ? 'active' : '' }}">
                <a href="{{ route('boms.index') }}">(BOM)</a>
            </li>
        @endif

        @if ($showMesin)
            <li class="{{ request()->routeIs('mesins.index') ? 'active' : '' }}">
                <a href="{{ route('mesins.index') }}">Mesin</a>
            </li>
        @endif

        @if ($showInventaris)
            <li class="{{ request()->routeIs('inventaris.index') ? 'active' : '' }}">
                <a href="{{ route('inventaris.index') }}">Inventaris</a>
            </li>
        @endif

        @if ($showUsers)
            <li class="{{ request()->routeIs('users.index') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">Pengguna</a>
            </li>
        @endif

    </ul>
</div>
