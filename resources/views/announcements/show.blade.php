<x-layout>
    {{-- Navbar --}}
    <x-nav></x-nav>

    <h1 class="display-2 d-flex justify-content-center fontTitoli text-white">Dettagli Annuncio</h1>

    

    <div class="container d-flex justify-content-center">
        <div class="row mb-5">
                <div class="col-6">
                    <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($announcement->images()->get() as $image)
                                    <div class="carousel-item @if($loop->first)active @endif">  
                                        <img src="{{ $image->getUrl(400,300) }}" class="img-fluid p-3 rounded" alt="">
                                        
                                    </div>

                                    @endforeach
                                        <button class="carousel-control-prev carousel-dark" type="button" data-bs-target="#showCarousel" data-bs-slide="prev" data-bs-theme="dark">
                                            <span class="text-dark carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden ">Previous</span>
                                        </button>
                                        <button class="carousel-control-next carousel-dark" type="button" data-bs-target="#showCarousel" data-bs-slide="next" data-bs-theme="dark">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card shadow-lg fs-4 mt-3">
                        <div class="card-body">
                            <h5 class="card-title text-dark fs-2">{{ $announcement->title }}</h5>
                            <p class="card-text">{{ $announcement->body }}</p>
                            <p class="card-text">€{{ $announcement->price }}</p>
                            <p class="card-footer border border-light text-dark">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }} - Autore: {{ $announcement->user->name}}</p>
                            @if ($announcement->user_id != Auth::id())
                                <a href="{{route('contact', compact('announcement'))}}" class="btn btn-warning big">Contatta {{ $announcement->user->name ?? 'Venditore' }}</a>
                            @endif
                            
                        </div>
                    </div>
                </div>  
</x-layout>






