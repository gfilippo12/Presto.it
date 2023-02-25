<x-layout>
    {{-- Navbar --}}
    <x-nav></x-nav>

    <div class="container-fluid" id="bgContainer">
        <div class="row">
            <div class="col-12 col-md-4 my-4">
                <div class="card shadow-lg" style="width: 18rem">
                    <img src="https://picsum.photos/200" alt="" class="card-img-top p-3 rounded">
                    <div class="card-body">
                        <h5 class="card-title">{{ $announcement->title }}</h5>
                        <p class="card-text">{{ $announcement->body }}</p>
                        <p class="card-text">{{ $announcement->price }}</p>
                        <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }} - Autore: {{ $announcement->user->name ?? '' }}</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</x-layout>