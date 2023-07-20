<nav>
    <h2>User Management System</h2>
    <ul>
        @auth
        @if (auth()->user()->is_admin)
            <li><a href="/">Home</a></li>
        @endif
        <li><a href="/logout">logout</a></li>
        @endauth
    </ul>
</nav>
