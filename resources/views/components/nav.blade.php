<nav class="navbar navbar-expand-lg bg-light fadeInDown" id="nav">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold big" id="logo" href='{{route('home')}}'>Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                {{-- Languages --}}
            <li class="nav-item">
                
                <x-_locale lang="it" nation='it'/>  
            </li>
            <li class="nav-item">
                <x-_locale lang="en" nation='gb'/>  
            </li>
                <li class="nav-item">
                    <a class="nav-link" area-current="page" href="{{route('announcements.index')}}">{{__('ui.announcementsLink')}}</a>
                </li>
                
            
            @guest
            <li class="nav-item">
                <a class="nav-link fw-bold " href="/login">{{__('ui.login')}}</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="/register">{{__('ui.register')}}</a>
            </li>
            
            @else
            
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('announcements.create')}}">{{__('ui.announcementCreate')}}</a>
            </li>
            
    
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                @if (Auth::user()->is_revisor)
                    <span class="position-absolute top-0 start-100 translate-middle badge border border-danger rounded-circle bg-danger">
                        {{App\Models\Announcement::toBeRevisionedCount()}}
                        <span class="visually-hidden">
                        </span>
                    </span>
                @endif
                
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        @if (Auth::user()->is_revisor)
                            <li class="nav-item">
                                <a href="{{route('revisor.index')}}" class="nav-link btn-outline btn btn-warning shadow mb-2 position-relative" aria-current="page">
                                    {{__('ui.revisorLink')}}
                                    <span class="position-absolute top-0 start-100 translate-middle badge border border-danger rounded-circle bg-danger">
                                        {{App\Models\Announcement::toBeRevisionedCount()}}
                                        <span class="visually-hidden">
                                        </span>
                                    </span>
                                </a>
                            </li>
                        @endif

                        <form action="/logout" method="POST">
                        @csrf
                            <button type="submit" class="nav-link btn btn-warning shadow">{{__('ui.backBtn')}}</button>
                        </form>
                    </li>
                </ul>
            </li>
            @endguest

        </div>
        </div>
</nav>
