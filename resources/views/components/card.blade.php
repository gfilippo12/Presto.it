

    @foreach ($annunci as $announcement)
    <div class="col-lg-4 col-md-6 col-sm-10 my-4 d-flex justify-content-center">
        <div class="card bgh1 shadow-lg text-white fs-4" style="width: 18rem">
            <img src="https://picsum.photos/200" alt="" class="card-img-top p-3 rounded">
            <div class="card-body">
                <h5 class="card-title fs-2" id="text">{{ $announcement->title }}</h5>
                <p class="card-text">{{ $announcement->body }}</p>
                <p class="card-text">{{ $announcement->price }}</p>
                <a href= {{route('announcements.show', compact('announcement'))}} class="btn btn-light shadow">Visualizza</a>
                <a href= {{route('categoryShow', ['category'=>$announcement->category])}} class="my-2 border-top pt-2 border-dark card-link shadow btn btn-dark">Categoria: {{ $announcement->category->name }}</a>
                <p class="card-footer border border-light" id="text">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>   
@endforeach
