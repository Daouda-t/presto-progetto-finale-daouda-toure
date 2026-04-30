<nav class="navbar navbar-expand-lg bg-dark border-bottom" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('homepage')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">Home</a>
                    <li><a class="dropdown-items" href="{{ route('create.article') }}">Crea</a></li>
                </li>
                <li class="nav-item">
                     @auth
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ciao, {{ Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                           
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
                                    class="dropdown-item">logout</a>
                                <form action="{{ route('logout') }}" method="POST" style="display: none;" id="form-logout">
                                    @csrf 
                                </form>
                          </ul>
                        </il>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ciao, Utente
                        </a>
                        <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
    <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
</ul>
                    @endauth
             </ul>
           </div>
    </div>
</nav>
