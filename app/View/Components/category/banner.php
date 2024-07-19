<?php

namespace App\View\Components\category;

use Illuminate\View\Component;

class banner extends Component
{
    
    
    public function __construct(public string $title,public string $category="")
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category.banner');
    }
}