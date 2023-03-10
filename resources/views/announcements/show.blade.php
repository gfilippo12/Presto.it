<x-layout>
    {{-- Navbar --}}
    <x-nav></x-nav>
    <h1 class="display-2 d-flex justify-content-center fontTitoli">Dettagli Annuncio</h1>


    <div class="container d-flex justify-content-center bgh1 border rounded mb-5">
        <div class="row mb-5">
                <div class="col-5">
                    <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200' }}" alt="" class="card-img-top p-3 rounded big img-fluid">
                </div>
                <div class="col-7">
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
        </div> 
    </div>
    
</x-layout>






