<x-layout>
    {{-- Navbar --}}
    <x-nav></x-nav>
    <h1 class="display-2 d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">Dettagli Annuncio</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4 my-4">
                <div class="card shadow-lg bgh1 fs-4 text-white" style="width: 18rem">
                    <img src="https://picsum.photos/200" alt="" class="card-img-top p-3 rounded">
                    <div class="card-body">
                        <h5 class="card-title text-dark fs-2">{{ $announcement->title }}</h5>
                        <p class="card-text">{{ $announcement->body }}</p>
                        <p class="card-text">{{ $announcement->price }}</p>
                        <p class="card-footer border border-light text-dark">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }} - Autore: {{ $announcement->user->name ?? '' }}</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</x-layout>