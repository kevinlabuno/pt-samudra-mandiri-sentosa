<div class="header">
    <div class="header-title">PT. Samudra Mandiri Sentosa</div>
    <div class="header-profile">
        <img 
            src="{{ asset('logo.png') }}" 
            alt="Profile" 
            class="profile-img"
        >
        <div class="dropdown">
            <ul>
<li>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" style="background: none; border: none; color: #153B5F; cursor: pointer;">Logout</button>
    </form>
</li>
            </ul>
        </div>
    </div>
</div>
