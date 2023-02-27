<x-layout>

<div class="container-fluid g-0">
    <x-nav></x-nav>
    <div class="container d-flex justify-content-between">
        <div class="row">
            <div class="col-6 mx-auto border p-3 rounded">
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
                            <button class="btn btn-warning">Accedi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</x-layout>