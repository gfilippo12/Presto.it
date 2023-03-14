<div id="announcementbackground">

    <div class="container m-5">
        <div class="row">
            <div class="col-6 mx-auto rounded p-3" id="announcementContainer">
                <h2 class="text-dark fw-bold">{{__('ui.create-h1')}}</h2>

                    @if (session()->has('message'))
                        <div class="flex flex-row justify-center my-2 alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="store">
                        @csrf

                        <div class="mb-3 ">
                            <label for="category">{{__('ui.category')}}</label>
                            <select wire:model.defer="category" id="category" class="form-control @error('category') is-invalid @enderror">
                            @error('category')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                            <option value="">{{__('ui.category-label')}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3 ">
                            <label for="title">{{__('ui.announcement-title')}}</label>
                            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 ">
                            <label for="body">{{__('ui.description-form')}}</label>
                            <textarea wire:model="body" type="text" class="form-control @error('body') is-invalid @enderror"></textarea>
                            @error('body')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 ">
                            <label for="price">{{__('ui.price-form')}}</label>
                            <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                                <span class="text-danger small">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <input wire:model="temporary_images" type="file" name="images" placeholder="Img" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" >
                            @error('temporary_images.*')
                            <span class="text-danger small">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div>
                            @if (!empty($images))
                            <div class="row">
                                <div class="col-12">
                                    <p> {{__('ui.img-preview')}}</p>
                                    <div class="row border border-4 border-info rounded shadow py-4">
                                        @foreach ($images as $key => $image)
                                        <div class="col">
                                            <div class="img-preview mx-auto shadow rounded img-thumbnail" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{__('ui.delete-img')}}</button>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-warning shadow-lg px-4 py-2 mt-3">
                            {{__('ui.btn-create')}}
                        </button>
                        
                    </form>
            </div>
        </div>
    </div>
</div>


