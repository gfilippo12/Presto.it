<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @guest
            <li class="nav-item">
                <a class="nav-link" href="/login" id="Accedi">Accedi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register" id="Registrati">Registrati</a>
            </li>
            
            @else
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link">Esci</button>
                        </form>
                    </li>
                </ul>
            </li>
            @endguest
        </div>
        </div>
</nav>
