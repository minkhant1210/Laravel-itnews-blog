<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuList extends Component
{
    public $name,$link,$class,$counter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name="name",$class="feather-home",$link="#",$counter="")
    {
        $this->name = $name;
        $this->class = $class;
        $this->link = $link;
        $this->counter = $counter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu-list');
    }
}
