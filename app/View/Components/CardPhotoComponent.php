<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardPhotoComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $name;
    public $img;
    public $desc;
    public $link;

    public function __construct($name, $img, $desc, $link)
    {
        $this->name = $name;
        $this->img = $img;
        $this->desc = $desc;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-photo-component');
    }
}
