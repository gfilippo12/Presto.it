<x-layout>
    <div class="container-fluid p-5 bgh1 shadow mb-4 g-0">
        <div class="row">
            <div class="col-12 text-dark p-5">
                <h1 class="display-2">
                    {{$announcement_to_check ? 'Ecco l\'annuncio da revisionare': 'non ci sono annunci da revisionare'}}
                    </h1>
            </div>    
        </div> 
    </div>
    
    @if($announcemet_to_check)
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
                            <p class="card-footer">Publicato il: {{$announcement_to_check->created_at->form()}}</p>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form action="{{route('revisor.accept_announcement', ['announcemement'=>$announcement_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success shadow">Accetta</button>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <form action="{{route('revisor.reject_announcement', ['announcemement'=>$announcement_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success shadow">Rifiuta</button>
                                </form>
                            </div>
                    </div>
                </div>
                @endif
          
                
    
               
    // * Button 
    
            <button
            type="button"
            class="btn btn-floating btn-lg"
            id="btn-back-to-top">
            <i class="bi bi-arrow-up-circle-fill"></i>
            </button>

            
</x-layout>