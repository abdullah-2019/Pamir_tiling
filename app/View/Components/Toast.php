<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{
    public $message;
    public $type;
    public $delay;

    public function __construct($message, $type = 'success', $delay = 3000)
    {
        $this->message = $message;
        $this->type = $type;
        $this->delay = $delay;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.toast');
    }
}

