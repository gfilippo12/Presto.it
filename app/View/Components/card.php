<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    public $annunci;
    /**
     * Create a new component instance.
     */
    public function __construct($annunci)
    {
        $this->annunci=$annunci;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
   $annunci=$this->annunci;
        return view('components.card', compact('annunci'));
    }
}
