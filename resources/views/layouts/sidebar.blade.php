<div class="sidebar">
    <ul class="menu">

        <li class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
            <a href="{{ route('beranda') }}">Beranda</a>
        </li>

        <li class="divider"></li> 

        <p style="padding-left:20px;color:#5a5c5e86;padding: 10px 20px;margin: 10px 15px;border-radius:8px"><b>Packaging Materials</b></p>
        <li class="submenu {{ request()->routeIs('kontainer.index') ? 'active' : '' }}">
            <a href="{{ route('kontainer.index') }}">Kontainer</a>
        </li>
        <li class="submenu {{ request()->routeIs('kartons.index') ? 'active' : '' }}">
            <a href="{{ route('kartons.index') }}">Karton</a>
        </li>
        <li class="submenu {{ request()->routeIs('kalengs.index') ? 'active' : '' }}">
            <a href="{{ route('kalengs.index') }}">Kaleng</a>
        </li>

        <li class="divider"></li>

        <li  class="{{ request()->routeIs('ikans') ? 'active' : '' }}">
            <a href="{{ route('ikans') }}">Ikan</a>
        </li>

        <li class="divider"></li>

        <li  class="{{ request()->routeIs('tenagas.index') ? 'active' : '' }}">
            <a href="{{ route('tenagas.index') }}">Tenaga Kerja</a>
        </li>

        <li class="divider"></li>

        <p style="padding-left:20px;color:#5a5c5e86;padding: 10px 20px;margin: 10px 15px;border-radius:8px"><b>Item dan Bill of Materials (BOM)</b></p>
        <li class="submenu {{ request()->routeIs('items.index') ? 'active' : '' }}">
            <a href="{{ route('items.index') }}">Item</a>
        </li>
        <li class="submenu {{ request()->routeIs('boms.index') ? 'active' : '' }}">
            <a href="{{ route('boms.index') }}">(BOM)</a>
        </li>
        <li class="divider"></li>
        
        <li  class="{{ request()->routeIs('mesins.index') ? 'active' : '' }}">
            <a href="{{ route('mesins.index') }}">Mesin</a>
        </li>

        <li class="divider"></li>
        
        <li  class="{{ request()->routeIs('inventaris.index') ? 'active' : '' }}">
            <a href="{{ route('inventaris.index') }}">Inventaris</a>
        </li>


    </ul>
</div>


<script>
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('show');
}
</script>
