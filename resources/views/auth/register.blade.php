<x-layout>
    <div class="container pt-5">
<div class="row justify-content-center">
<div class="col-12 text-center">
<h1 class="display-4 pt-5">Registrati</h1>
</div>
</div>

        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-md-6">
            <form method="POST" action="{{ route('register') }}" class="bg-body-tertiary subtle-shadow rounded p-5">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text"  class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="registerEmeil" class="form-label">indirizzio Email:</label>
                        <input type="email"  class="form-control" id="registerEmail" name="email">
                            
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password:</label>
                        <input type="password"  class="form-control" id="Password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">conferma la password:</label>
                        <input type="password"  class="form-control" id="password_confirmation"
                         name="password_confirmation">
                    </div>
                    <li class="nav-item dropdown">
                    @auth
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ciao, {{ Auth::user()->name }}
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                        </ul>

                  <div class="justify-content-center">
                    <button type="submit" class="btn btn-dark">Registrati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>