<nav class="navbar navbar-expand-lg bg-dark border-bottom" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('homepage') }}">Navbar</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            {{-- Lato sinistro --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create.article') }}">Crea</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">{{ __('ui.allArticles') }}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item text-capitalize"
                                   href="{{ route('bycategory', ['category' => $category]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            {{-- Lato destro --}}
            <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2">

                {{-- Search --}}
                <form class="d-flex" role="search" action="{{ route('article.search') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control"
                            placeholder="Cerca..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            Cerca
                        </button>
                    </div>
                </form>

                
                <div class="d-flex align-items-center gap-1">
    <x-locale lang="it" />
    <x-locale lang="uk" />
    <x-locale lang="fr" />
</div>

                @auth
                    @if (auth()->user()->is_revisor)
                        <a class="btn btn-outline-success btn-sm position-relative"
                            href="{{ route('revisor.index') }}">
                            Zona revisore
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ \App\Models\Article::toBeRevisedCount() }}
                            </span>
                        </a>
                    @endif

                    <div class="dropdown">
                        <a class="btn btn-outline-light dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Ciao, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                                    Logout
                                </a>
                                <form action="{{ route('logout') }}" method="POST" id="form-logout" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="dropdown">
                        <a class="btn btn-outline-light dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Ciao, Utente
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>