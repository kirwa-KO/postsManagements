<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card extends Component
{
    public  $mt;
    public  $title;
    public  $paragraph;
    public  $items;
    public  $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($mt, $title, $paragraph, $items, $type)
    {
        $this->mt = $mt;
        $this->title = $title;
        $this->paragraph = $paragraph;
        $this->items = $items;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
