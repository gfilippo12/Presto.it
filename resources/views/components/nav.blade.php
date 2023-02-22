<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Presto logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                
            <li class="nav-item" id="Accedi">
                <a class="nav-link" href="/login">Accedi</a>
            </li>
            <li class="nav-item" id="Registrati">
                <a class="nav-link" href="/register">Registrati</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                
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
</nav>
