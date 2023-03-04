<div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto rounded p-3" id="announcementContainer">
                <h2 class="text-dark fw-bold">CREA IL TUO ANNUNCIO</h2>

                    @if (session()->has('message'))
                        <div class="flex flex-row justify-center my-2 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="store">
                        @csrf

                        <div class="mb-3 ">
                            <label for="category">Categoria</label>
                            <select wire:model.defer="category" id="category" class="form-control">
                            <option value="">Scegli la categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        
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
                                <span class="text-danger small">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img">
                            @error('temporary_images.*')
                            <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            @if (!empty($images))
                            <div class="row">
                                <div class="col-12">
                                    <p> Photo Preview:</p>
                                    <div class="row border border-4 border-info rounded shadow py-4">
                                        @foreach ($images as $key => $image)
                                        <div class="col my-3">
                                            <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella Immagine</button>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                            <button type="submit" class="btn btn-warning shadow-lg px-4 py-2">
                                Crea
                            </button>
                        
                    </form>
            </div>
        </div>
    </div>
    
</div>