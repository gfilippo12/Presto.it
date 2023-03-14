<x-layout>

    <div class="container-fluid g-0" id="bg-revisor">

        {{-- Navbar --}}
        <x-nav></x-nav>

        <div class="container mt-4">
            <div class="row">
                <h1 class="d-flex justify-content-center text-white display-2 tracking-in-contract-bck fontTitoli">Zona Revisor</h1>
                
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
                    <table class="table  table-bordered bg-light fontModal">
                        <thead>
                            <td class="fw-bold">Titolo</td>
                            <td class="fw-bold">Descrizione</td>
                            <td class="fw-bold">Pubblicato</td>
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
                            {{-- <img src="{{Storage::url($image->path) }}" class="img-fluid p-3 rounded" 
                            alt="..."> --}}
                            <img src="{{ $image->getUrl(400,300) }}" class="img-fluid p-3 rounded" alt="">
                        </div>
                        <div class="col-md-3 border-end">
                            <h5 class="tc-accent mt-3">Tags</h5>
                            <div class="p-2"> 
                                @if ($image->labels)
                                @foreach ($image->labels as $label)
                                <p class="d-inline">{{ $label }},</p>
                                @endforeach
                                @endif
                            </div>
                            

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

                         <div>
                            <div>
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <h5 class="tc-accent">Revisiona Immagini</h5>
                                        <p>Adulti: <span class="{{ $image->adult}}"></span></p>
                                        <p>Satira: <span class="{{ $image->spoof}}"></span></p>
                                        <p>Medicina: <span class="{{ $image->medical}}"></span></p>
                                        <p>Violenza: <span class="{{ $image->violence}}"></span></p>
                                        <p>Contenuto Razzista: <span class="{{ $image->racy}}"></span></p>

                                    </div>

                                </div>
                            </div>
                         </div>
                   
                
                    
                
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

    <table class="table table-bordered bg-light fontModal">
        <thead>
            <tr>
                <td class="fw-bold">Titolo</td>
                <td class="fw-bold">Categoria</td>
                <td class="fw-bold">Data</td>
                <td class="fw-bold">Stato</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($announcements as $announcement)
                <tr>
                    <td><a class="text-decoration-none text-dark" href="{{route('announcements.show', compact('announcement'))}}">{{ $announcement->title }}</a></td>
                    <td>{{ $announcement->category->name }}</td>
                    <td>{{$announcement->created_at->format('d/m/Y')}}</td>
                    <td>
                        @if($announcement->is_accepted)
                            <p class="text-success fw-bold">ACCETTATO</p> 
                        @else
                            <p class="text-danger fw-bold">RIFIUTATO</p> 
                        @endif
                    </td>
                    <td>
                        <div class="container d-flex">
                            <div class="row">
                                <div class="col-6">
                                    <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement])}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="button" class="btn btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#acceptModal">ACCETTA</button>
                                        <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="fontModal fw-bold modal-title fs-3" id="exampleModalLabel">Accetta Annuncio!</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body fontModal fs-5">
                                                Sei sicuro di voler accettare l'annuncio?
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">ANNULLA</button>
                                                <button type="submit" class="btn btn-success fw-bold">ACCETTA</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement])}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="button" class="btn btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#rejectModal">RIFIUTA</button>
                                        <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h1 class="fontModal modal-title fs-3 fw-bold" id="exampleModalLabel">RIFIUTA ANNUNCIO!</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body fontModal fs-5">
                                                Sei sicuro di voler rifiutare l'annuncio?
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">ANNULLA</button>
                                                <button type="submit" class="btn btn-danger fw-bold">RIFIUTA</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
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