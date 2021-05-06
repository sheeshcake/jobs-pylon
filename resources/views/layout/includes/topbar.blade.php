<ul>
    @if(Route::current()->getName())
    <li><a class="nav-link scrollto active" href="/">Home</a></li>
    @endif
    @if(!auth('user')->check())
    <li><a class="nav-link scrollto" href="/login">Login</a></li>
    @else
    <li><a class="nav-link scrollto" href="/logout">Logout</a></li>
    @endif
</ul>