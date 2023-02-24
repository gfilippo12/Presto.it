<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12  mx-auto pt-5 ">
                <h1 class=" text-center text-white d-flex justify-content-center fw-bold mt-5 border  rounded" id="bg">PRESTO.IT <br> CONSEGNE IN TUTTA ITALIA</h1>
            </div>
            <div class="custom-shape-divider-bottom-1677180806">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" class="shape-fill"></path>
                </svg>
            </div>

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
                                            <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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