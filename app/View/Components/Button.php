<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $type;
    public bool $disabled;

    public function __construct(
        string $type = 'button',
        bool $disabled = false
    ) {
        $this->type = $type;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('components.button');
    }
}
