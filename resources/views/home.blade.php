<x-layout>

    <div class="container-fluid g-0" id="bgContainer">
        <x-nav></x-nav>
        <div class="row">
                <div class="col-12 mx-auto ">
                    <h1 class="first-text"><span class="tracking-in-contract-bck ">PRESTO.IT</span><br> CONSEGNE IN <br>TUTTA ITALIA</h1>
                    <div class="d-grid gap-2 d-md-block ">
                        <a href="{{ route('announcements.create')}}" class="heartbeat  btn btn-lg btn-outline-warning text-white border border-light border-3" id="button1">Vendi!</a>
                        <a href="{{route('announcements.index')}}" class=" heartbeat btn btn-lg btn-outline-warning text-white border border-light border-3" id="button2">Acquista!</a>
                    </div>
                </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mx-auto">
                <p class="fw-bold text-dark" id="recenti">Le Nostre Categorie</p>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="container-fluid col-6" id="search1">
                <div class="row">
                    <div class="col-6">
                        <form action="{{route('announcements.search')}}" method="GET" id="search2" class="d-flex">
                            <input  name="searched" class="form-control me-2" type="search" placeholder="Cerca in annunci..." aria-label="search">
                            <button class="btn btn-light fw-bold d-flex align-items-center" type="submit">CERCA</button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="categorie1" class="col-6">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    CATEGORIE
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                        @endforeach
                    </ul>
                </li>
            </div>
        </div>
    </div>

    <div class="container mt-3 fw-bold d-flex justify-content-center">
        <div class="row">
            <div class="col-3 d-flex flex-column text-white" id="box">
                <h3 class="fw-bold">TECNOLOGIA</h3>
                <a href="" class="btn btn-outline-light">Annunci in "Tecnologia"</a>
            </div>
            <div class="col-3 d-flex flex-column text-white" id="box">
                <h3 class="fw-bold">MOTORI</h3>
                <a href="" class="btn btn-outline-light">Annunci in "Motori"</a>
            </div>
            <div class="col-3 d-flex flex-column text-white" id="box">
                <h3 class="fw-bold">INFORMATICA</h3>
                <a href="" class="btn btn-outline-light">Annunci in "Informatica"</a>
            </div>
            <div class="col-3 d-flex flex-column text-white" id="box">
                <div>
                    <h3 class="fw-bold">LIBRI</h3>
                </div>
                <a href="/categoria/4" class="btn btn-outline-light">Annunci in "Libri"</a>
            </div>
        </div>
    </div>
        

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mx-auto">
                <p class="fw-bold text-dark" id="recenti">Annunci Recenti</p>
            </div>
              {{-- card component --}}
             
              <x-card :annunci="$announcements"/>
                
              
        </div>
    </div>
        
    
    
    {{-- Button for Scroll Up --}}
            <button
            type="button"
            class="btn btn-floating btn-lg"
            id="btn-back-to-top">
            <i class="bi bi-arrow-up-circle-fill"></i>
            </button>

</x-layout>