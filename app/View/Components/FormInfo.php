<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInfo extends Component
{
    public $formName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($formName)
    {
        $this->formName = $formName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-info');
    }
}
