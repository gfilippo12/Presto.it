<x-layout>
        {{-- Navbar --}}
        <x-nav></x-nav>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="d-flex justify-content-center display-2 mt-4 fontTitoli" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">Esplora la categoria {{ $category->name }}</h1> 

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($category->announcements as $announcement)
                    <div class="col-12 col-md-4 my-4">
                        <div class="card shadow-lg bgh1 text-white fs-4" style="width: 18rem">
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200' }}" alt="" class="card-img-top p-3 rounded big">

                            <div class="card-body">
                                <h5 class="card-title fs-2 text-dark">{{ $announcement->title }}</h5>
                                <p class="card-text">{{ $announcement->body }}</p>
                                <p class="card-text">{{ $announcement->price }}</p>
                                <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn-light shadow">Visualizza</a>
                                <a href="" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-dark">Categoria: {{ $announcement->category->name }}</a>
                                <p class="card-footer border border-light text-dark">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }} - Autore: {{ $announcement->user->name ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="h1">Non sono presenti annunci per questa categoria!</p>
                        <p class="h2">Pubblicane uno: <a href="{{ route('announcements.create') }}" class="btn btn-warning shadow">Pubblica!</a></p>
                    </div>
                @endforelse
                </div>
            </div>
        </div>
    </div>

    
    
    {{-- Button for Scroll Up --}}
            <button
            type="button"
            class="btn btn-floating btn-lg"
            id="btn-back-to-top">
            <i class="bi bi-arrow-up-circle-fill"></i>
            </button>
        </div>
    </div>
</div>        

</x-layout>