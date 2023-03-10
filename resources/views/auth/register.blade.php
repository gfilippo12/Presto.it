<x-layout-base>

<div class="container-fluid g-0" id="registerbackground">
    <x-nav></x-nav>
    <div class="container m-1">
        <div class="row">
            <div class="col-6 mx-auto border p-3 rounded" id="registerform">
                <h1 class="text-dark">{{__('ui.register')}}</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">{{__('ui.name')}}</label>
                            <input type="name" name="name" id="name" class="form-control">
                            @error('name') 
                            <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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
                        <div class="col-12">
                            <label for="password_confirmation">{{__('ui.passwordConfirmation')}}</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            @error('password_confirmation') 
                            <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-warning fw-bold">Registrati</button>
                            <div class="d-flex fs-6 gap-2 mt-3">
                                <span>{{__('ui.alreadyRegister')}}</span><a class="fw-bold text-decoration-none text-warning" href="/login">{{__('ui.login')}}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</x-layout-base>