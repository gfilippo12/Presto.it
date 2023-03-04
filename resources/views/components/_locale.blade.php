<form action="{{route('set_language_local', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="nav-link" style='background-color:trasparent; border:none'>
        <span class="flag-icon flag-icon-{{$nation}}"></span>
    </button>
</form>

