<x-layout>
    <div class="container-fluid p-5 bgh1 shadow mb-4">
        <div class="row">
            <div class="col-12 text-dark p-5">
                <h1 class="display-2">I Nostri Annunci</h1>
            </div>    
        </div> 
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <p class="h2 my-2 fw-bold text-center text-white d-flex justify-content-center mb-5 mt-5 pb-3 pt-3 border rounded border-warning border-opacity-50 bgh1" id="recenti">Annunci Recenti</p>
            </div>
                @foreach ($announcements as $announcement)
                    <div class="col-lg-4 col-md-6 col-sm-10 my-4 d-flex justify-content-center">
                        <div class="card shadow" style="width: 18rem">
                            <img src="https://picsum.photos/200" alt="" class="card-img-top p-3 rounded">
                            <div class="card-body">
                                <h5 class="card-title">{{ $announcement->title }}</h5>
                                <p class="card-text">{{ $announcement->body }}</p>
                                <p class="card-text">{{ $announcement->price }}</p>
                                <a href= {{route('announcements.show', compact('announcement'))}} class="btn btn-warning shadow">Visualizza</a>
                                <a href= {{route('categoryShow', ['category'=>$announcement->category])}} class="my-2 border-top pt-2 border-dark card-link shadow btn btn-dark">Categoria: {{ $announcement->category->name }}</a>
                                <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$announcements->links()}}
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