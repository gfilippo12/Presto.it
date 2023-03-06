<x-layout>
    {{-- Navbar --}}
    <x-nav></x-nav>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-2 d-flex justify-content-center mt-4" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">I Nostri Annunci</h1>


                <div class="container-fluid">
                    <div class="row">
                            @forelse ($announcements as $announcement)
                                <div class="col-lg-4 col-md-6 col-sm-10 my-4 d-flex justify-content-center ">
                                    <div class="card shadow-lg bgh1 text-white fs-4" style="width: 18rem">
                                        <img src="{{!$announcement->image()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200' }}" alt="..." class="card-img-top p-3 rounded">
                                        <div class="card-body">
                                            <h5 class="card-title fs-2 text-dark">{{ $announcement->title }}</h5>
                                            <p class="card-text">{{ $announcement->body }}</p>
                                            <p class="card-text">{{ $announcement->price }}</p>
                                            <a href= {{route('announcements.show', compact('announcement'))}} class="btn btn-light shadow">Visualizza</a>
                                            <a href= {{route('categoryShow', ['category'=>$announcement->category])}} class="my-2 border-top pt-2 border-dark card-link shadow btn btn-dark">Categoria: {{ $announcement->category->name }}</a>
                                            <p class="card-footer border border-light text-dark">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="alert alert-warning py-3 shadow">
                                        <p class="lead">Non ci sono annunci per questa ricerca. prova a cambiare nome</p>
                                    </div>
                                </div>
                            @endforelse
                            {{$announcements->links()}}
                    </div>
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



</x-layout>