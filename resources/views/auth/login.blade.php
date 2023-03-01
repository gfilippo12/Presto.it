<x-layout>

<div class="container-fluid g-0" id="loginbackground">
    <x-nav></x-nav>
    <div class="container justify-content-center" >
        <div class="row">
            <div class="col-6 mx-auto border p-3 rounded" id="loginform">
                <h1 class="text-dark">Accedi</h1>
                <form action="/login" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            @error('email') 
                            <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password') 
                            <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-warning fw-bold ">Accedi</button>
                            <div class="d-flex fs-6 gap-2 mt-3">
                                <span>Prima volta su Presto?</span><a class="fw-bold text-decoration-none text-warning" href="/register">Registrati</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</x-layout>