<?php

namespace App\View\Components\Lvz;

use Illuminate\View\Component;

class FormInputStatus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $message
    )
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('_lvz.components.form-input-status');
    }
}
