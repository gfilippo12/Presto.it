<?php

namespace App\Http\Livewire;

use App\Jobs\ResizeImage;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use File;

class CreateAnnouncement extends Component
{

    use WithFileUploads;



    public $title;
    public $body;
    public $price;
    public $category;
    public $message;
    public $validated;
    public $temporary_images;
    public $images=[];
    public $image;
 
    public $announcement;
   
    


    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'category' => 'required',
        'price' => 'required|numeric',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
       

    ];

    protected $messages = [
        'required' => 'Il campo :attribute è obbligatorio',
        'min' => 'Il campo :attribute è troppo corto',
        'numeric' => 'Il campo :attribute dev\' essere un numero',
        'temporary_images.required' => 'Immagine richiesta',
        'temporary_images.*.image'=>'I file devono essere immagini',
        'temporary_images.*.max'=>'Il file deve essere al massimo 1mb',
        'images.image'=>'Il file deve essere una immagine',
        'image.max'=>'Il file deve essere al massimo 1mb'
        
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])){
            foreach ($this->temporary_images as $image){
                $this->images[]= $image;
            }
        }
    }

    public function removeImage($key)
    {
      if (in_array($key, array_keys($this->images))) {
        unset($this->images[$key]);
      } 
    }

    public function store()
    {
        $this->validate();

        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if(count($this->images)){
            foreach ($this->images as $image){
                //$this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                dispatch(new ResizeImage($newImage->path , 400 , 300));
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('message','Articolo inserito con successo, sarà publicato dopo la revisione');
        $this->cleanForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    // public function store()
    // {
    //     $this->validate();
    //     $category = Category::find($this->category);

    //     $announcement = $category->announcements()->create([
    //         'title'=>$this->title,
    //         'body'=>$this->body,
    //         'price'=>$this->price,
    //     ]);
    //     Auth::user()->announcements()->save($announcement);

    //     session()->flash('message', 'Annuncio creato con successo!');
    //     $this->cleanForm();
    // }

   

    public function cleanForm()
    {
            $this->title = '';
            $this->body = '';
            $this->price = '';
            $this->category = '';
            
            $this->images=[];
            $this->temporary_images = [];
           
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
