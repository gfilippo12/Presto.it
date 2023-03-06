<x-layout>

    <div class="container-fluid g-0" id="bg-revisor">

        {{-- Navbar --}}
        <x-nav></x-nav>

        <div class="container mt-4">
            <div class="row">
                <h1 class="d-flex justify-content-center text-white display-2 tracking-in-contract-bck">Zona Revisor</h1>
                
            </div>
        </div>
    </div>

    <div class="col-12 text-dark ">
            <h5 class="fw-bold d-flex justify-content-center mt-3" id="text-revisor">
                    {{$announcement_to_check ? 'Ecco l\'annuncio da revisionare': 'Non ci sono annunci da revisionare'}}
            </h5>
    </div>
        
    
    @if($announcement_to_check)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <table class="table  table-bordered bg-light">
                        <thead>
                            <td>Titolo</td>
                            <td>Descrizione</td>
                            <td>Pubblicato</td>
                        </thead>

                        <tbody>
                            <td>{{$announcement_to_check->title}}</td>
                            <td>{{$announcement_to_check->body}}</td>
                            <td>{{$announcement_to_check->created_at->format('d/m/Y')}}</td>
                        </tbody>
                    </table>
                </div>
                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                    @if ($announcement_to_check->images)
                    <div class="carousel-inner">
                        @foreach ($announcement_to_check->images as $image)
                        <div class="carousel-item @if($loop->first)active @endif">
                            <img src="{{Storage::url($image->path) }}" class="img-fluid p-3 rounded" 
                            alt="...">
                        </div>
                        @endforeach
                        </div>
                        @else

                         <div class="carousel-item">
                            <img src="http://picsum.photos/id/27/1200/400" class="img-fluid p-3 rounded" 
                            alt="...">
                         </div>

                         <div class="carousel-item">
                            <img src="http://picsum.photos/id/27/1200/400" class="img-fluid p-3 rounded" 
                            alt="...">

                         </div>
                         <div class="carousel-item">
                            <img src="http://picsum.photos/id/27/1200/400" class="img-fluid p-3 rounded" 
                            alt="...">

                         </div>
                         <div class="carousel-item">
                            <img src="http://picsum.photos/id/27/1200/400" class="img-fluid p-3 rounded" 
                            alt="...">
                         </div>
                         @endif
                   
                
                    
                
                         <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                         </button>
                    </div>
                    <div class="container d-flex mb-5 justify-content-center">
                        <div class="row">
                            <div class="col-6">
                                <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Accetta</button>
                                </form>
                            </div>
    
                            
                                <div class="col-6">
                                    <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger">Rifiuta</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                    
                @endif


    <h2 class="d-flex justify-content-center text-white">Tutti gli annunci</h2>

    <table class="table table-bordered bg-light">
        <thead>
            <tr>
                <td>Titolo</td>
                <td>Categoria</td>
                <td>Data</td>
                <td>Stato</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->category->name }}</td>
                    <td>{{$announcement->created_at->format('d/m/Y')}}</td>
                    <td>
                        @if($announcement->is_accepted)
                            <p class="text-success">ACCETTATO</p> 
                        @else
                            <p class="text-danger">RIFIUTATO</p> 
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