<div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto bgh1 rounded">
                <h1 class="text-white">Crea il tuo annuncio</h1>

                    @if (session()->has('message'))
                        <div class="flex flex-row justify-center my-2 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="store">
                        @csrf

                        <div class="mb-3 ">
                            <label for="title">Titolo Annuncio</label>
                            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 ">
                            <label for="body">Descrizione</label>
                            <textarea wire:model="body" type="text" class="form-control @error('body') is-invalid @enderror"></textarea>
                            @error('body')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 ">
                            <label for="price">Prezzo</label>
                            <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 ">
                            <label for="category">Categoria</label>
                            <select wire:model.defer="category" id="category" class="form-control">
                            <option value="">Scegli la categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>
                        </div>

                            <button type="submit" class="btn btn-warning shadow-lg px-4 py-2">
                                Crea
                            </button>
                        
                    </form>
            </div>
        </div>
    </div>
    
</div>