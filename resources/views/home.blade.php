<x-layout>

    <div class="container-fluid g-0" id="bgContainer">
        <x-nav></x-nav>
        <div class="row">
                <div class="col-12 mx-auto ">
                    <h1 class="first-text"><span class="tracking-in-contract-bck ">PRESTO.IT</span><br> CONSEGNE IN <br>TUTTA ITALIA</h1>
                    <div class="d-grid gap-2 d-md-block ">
                        <a href="{{ route('announcements.create')}}" class="heartbeat btn btn-outline-warning text-white border border-light border-3" id="button1">Vendi!</a>
                        <a href="{{route('announcements.index')}}" class=" heartbeat btn btn-outline-warning text-white border border-light border-3" id="button2">Acquista!</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mx-auto">
                <p class="fw-bold text-dark" id="recenti">Annunci Recenti</p>
            </div>
                @foreach ($announcements as $announcement)
                    <div class="col-lg-4 col-md-6 col-sm-10 my-4 d-flex justify-content-center">
                        <div class="card shadow-lg" style="width: 18rem">
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