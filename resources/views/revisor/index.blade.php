<x-layout>
    {{-- Navbar --}}
    <x-nav></x-nav>
    <div class="container-fluid p-5 bgh1 shadow mb-4 g-0">
        <div class="row">
            <div class="col-12 text-dark p-5">
                <h1 class="display-2">
                    {{$announcement_to_check ? 'Ecco l\'annuncio da revisionare': 'non ci sono annunci da revisionare'}}
                    </h1>
            </div>    
        </div> 
    </div>
    
    <h2>Annunci da revisionare</h2>

    @if($announcement_to_check)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="http://picsum.photo/id/27/1200/400" class="img-fluid p-3 rounded" 
                            alt="...">
                         </div>

                         <div class="carousel-item">
                            <img src="http://picsum.photo/id/27/1200/400" class="img-fluid p-3 rounded" 
                            alt="...">
                         </div>

                         <div class="carousel-item">
                            <img src="http://picsum.photo/id/27/1200/400" class="img-fluid p-3 rounded" 
                            alt="...">

                         </div>
                         <div class="carousel-item">
                            <img src="http://picsum.photo/id/27/1200/400" class="img-fluid p-3 rounded" 
                            alt="...">

                         </div>
                         <div class="carousel-item">
                            <img src="http://picsum.photo/id/27/1200/400" class="img-fluid p-3 rounded" 
                            alt="...">
                         </div>
                         <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                         </button>
                         <div>
                            <h5 class="card-title">Titilo: {{$announcement_to_check->title}}</h5>
                            <p class="card-text">Descrizione: {{$announcement_to_check->body}}</p>
                            <p class="card-footer">Publicato il: {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success shadow">Accetta</button>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success shadow">Rifiuta</button>
                                </form>
                            </div>
                    </div>
                </div>
                @endif

<h2>Tutti gli annunci</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <td>Titolo</td>
            <td>Descrizione</td>
            <td>Stato</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($announcements as $announcement)
            <tr>
                <td>{{ $announcement->title }}</td>
                <td>{{ $announcement->body }}</td>
                <td>
                    @if($announcement->is_accepted)
                        <p class="text-success">ACCETTATO</p> 
                    @else
                        <p class="text-danger">IN ELABORAZIONE</p> 
                    @endif
                </td>
                <td>
                    <div class="container d-flex">
                        <div class="row">
                            <div class="col-6">
                                <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Accetta</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger">Rifiuta</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
                
    
            {{-- Btn for Scroll Up --}}
            <button
            type="button"
            class="btn btn-floating btn-lg"
            id="btn-back-to-top">
            <i class="bi bi-arrow-up-circle-fill"></i>
            </button>


            
            
</x-layout>