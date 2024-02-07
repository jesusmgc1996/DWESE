<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $colortext;
    public $colorfondo;

    /**
     * Create a new component instance.
     */
    public function __construct($colortext = "red", $colorfondo = "gray")
    {
        $this->colortext = $colortext;
        $this->colorfondo = $colorfondo;
    }

    public function peligro() {
        if ($this->colorfondo == "red") {
            return "¡¡¡¡¡¡PELIGRO!!!!!!";
        } else {
            return "¡¡¡¡¡¡CUIDADO!!!!!!";
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
