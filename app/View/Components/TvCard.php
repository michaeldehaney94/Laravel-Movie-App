<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request;

class TvCard extends Component
{

    public $tvshow;
    public $genres;

    public function __construct($tvshow, $genres)
    {
       $this->tvshow = $tvshow;
       $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tv-card');
    }
}
