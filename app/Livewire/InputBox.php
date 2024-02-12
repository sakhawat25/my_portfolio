<?php

namespace App\Livewire;

use Livewire\Component;

class InputBox extends Component
{
    public $label;
    public $type;
    public $field;
    public $value;

    public function render()
    {
        return view('livewire.input-box');
    }
}
