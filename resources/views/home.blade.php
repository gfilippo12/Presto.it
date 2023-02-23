<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Presto, Consegne in tutt'Italia</h1>

                    <p class="h2 my-2 fw-bold">Gli annunci più recenti</p>
                        <div class="row">
                            @foreach ($announcements as $announcement)
                                <div class="col-12 col-md-4 my-4">
                                    <div class="card shadow" style="width: 18rem">
                                        <img src="https://picsum.photos/200" alt="" class="card-img-top p-3 rounded">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $announcement->title }}</h5>
                                            <p class="card-text">{{ $announcement->body }}</p>
                                            <p class="card-text">{{ $announcement->price }}</p>
                                            <a href="" class="btn btn-primary shadow">Visualizza</a>
                                            <a href="" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{ $announcement->category->name }}</a>
                                            <p class="car-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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