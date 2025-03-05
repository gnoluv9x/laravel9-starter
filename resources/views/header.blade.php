@if (checkAuth())
    <div>Welcome {{ session()->get('name') }}</div>
    <a href={{ route('logout') }}>Logout</a>
@else
    <a href={{ route('login') }}>Login</a>
@endif
