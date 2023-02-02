<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LangButton extends Component
{
    public bool $active;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $active)
    {
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lang-button');
    }
}
