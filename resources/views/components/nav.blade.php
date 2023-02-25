<nav class="navbar navbar-expand-xxl" id="nav">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href='{{route('home')}}'>Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href='{{route('home')}}'>Home</a>
                </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoriesDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorie
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href={{ route('categoryShow', compact('category')) }}>{{ $category->name }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" area-current="page" href={{route('announcements.index')}}>Annunci</a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link fw-bold " href="/login">Accedi</a>
            </li>
            <li class="nav-item fw-bold ">
                <a class="nav-link " href="/register">Registrati</a>
            </li>
            
            @else
            
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('announcements.create')}}">Nuovo annuncio</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-warning shadow">Esci</button>
                        </form>
                    </li>
                </ul>
            </li>
            @endguest
        </div>
        </div>
</nav>
