<nav>
    <h2 class="logo">
        <a  @auth @if (auth()->user()->is_admin) href="/"  @endif @endauth>
            User Management System
        </a>
    </h2>

    <ul>
        @auth
        @if (auth()->user()->is_admin)
            <li><a href="/">Home</a></li>
        @endif
        <li><a href="/logout">logout</a></li>
        @endauth
    </ul>
</nav>
