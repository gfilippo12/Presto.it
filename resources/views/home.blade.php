<x-layout>

    <div class="container-fluid g-0" id="bgContainer">
        {{-- Navbar --}}
        <x-nav></x-nav>

        {{-- Header --}}
        <div class="row">
                <div class="col-12 mx-auto ">
                    <h1 class="first-text fontTitoli"><span class="tracking-in-contract-bck ">{{__('ui.entryTitle')}} <br> {{__('ui.entryTitle2')}} <br>{{__('ui.entryTitle3')}}</h1>
                    
                    <div class="d-grid gap-2 d-md-block ">
                        <a href="{{ route('announcements.create')}}" class="heartbeat  btn btn-lg btn-outline-warning text-white border border-light border-3" id="button1">{{__('ui.sellBtn')}}</a>
                        <a href="{{route('announcements.index')}}" class=" heartbeat btn btn-lg btn-outline-warning text-white border border-light border-3" id="button2">{{__('ui.buyBtn')}}</a>
                    </div>
                </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mx-auto">
                <h2 class="fw-bold text-dark d-flex justify-content-center fontTitoli" id="recenti">{{__('ui.categoryTitle')}}</h2>
            </div>
        </div>
    </div>

    {{-- Category Search --}}
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="container-fluid col-6" id="search1">
                <div class="row">
                    <div class="col-6">
                        <form action="{{route('announcements.search')}}" method="GET" id="search2" class="d-flex">
                            <input  name="searched" class="form-control me-2" type="search" placeholder="{{__('ui.searchbar')}}" aria-label="search">
                            <button class="btn btn-light fw-bold d-flex align-items-center" type="submit">{{__('ui.searchBtn')}}</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Category Select --}}
            <div id="categorie1" class="col-6">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " href="#" id="categoriesDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('ui.categoryDropdown')}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                        @endforeach
                    </ul>
                </li>
            </div>
        </div>
    </div>

    {{-- Categories --}}
    <div class="container mt-3"  data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">
        <div class="row justify-content-center">
            <div class="col-3 d-flex flex-column text-white  big" id="box">
                <a href="/categoria/3" class="btn btn-outline-light fw-bold fs-4">{{__('ui.tecnologia')}}</a>
            </div>
            <div class="col-3 d-flex flex-column text-white big" id="box">
                <a href="/categoria/1" class="btn btn-outline-light fw-bold fs-4">{{__('ui.motori')}}</a>
            </div>
            <div class="col-3 d-flex flex-column text-white big" id="box">
                <a href="/categoria/2" class="btn btn-outline-light fw-bold fs-4">{{__('ui.informatica')}}</a>
            </div>
            <div class="col-3 d-flex flex-column text-white big" id="box">
                <a href="/categoria/4" class="btn btn-outline-light fw-bold fs-4">{{__('ui.libri')}}</a>
            </div>
        </div>
    </div>
        
    {{-- Latest Announcements --}}
    <div class="container-fluid" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">
        <div class="row">
            <div class="col-12 mx-auto">
                <h2 class="fontTitoli fw-bold text-dark d-flex justify-content-center" id="recenti">{{__('ui.allAnnouncements')}}</h2>
            </div>
            {{-- card component --}}

            <x-card :annunci="$announcements"/>

           
                

        </div>
    </div>


    {{-- Card for Become Revisor --}}
    <div class="container border rounded border-warning mt-5">
        <div class="row">
            <div class="col-12 ">
                <h2>Vuoi un’entrata extra? <br>
                    Conosci qualcuno che la vorrebbe? <br></h2>
                <p>Entra a far parte del <span class="fw-bold">Team Revisor</span> di
                    Presto.it</p>
                <a  href="{{route('become.revisor')}}" class="btn btn-warning text-light shadow my-3">Diventa Revisor</a>
                
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