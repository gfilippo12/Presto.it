<x-layout>

    <div class="container-fluid g-0" id="bgContainer">
        <x-nav></x-nav>
        <div class="row">
                <div class="col-12 mx-auto ">
                    <h1 class="first-text"><span class="tracking-in-contract-bck ">PRESTO.IT</span><br> CONSEGNE IN <br>TUTTA ITALIA</h1>
                    <div class="d-grid gap-2 d-md-block ">
                        <a href="{{ route('announcements.create')}}" class="heartbeat  btn btn-lg btn-outline-warning text-white border border-light border-3" id="button1">Vendi!</a>
                        <a href="{{route('announcements.index')}}" class=" heartbeat btn btn-lg btn-outline-warning text-white border border-light border-3" id="button2">Acquista!</a>
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
              {{-- card component --}}
              <x-card>
                
              </x-card>
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