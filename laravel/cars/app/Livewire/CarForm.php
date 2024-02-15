<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;

class CarForm extends Component
{
    public $name;
    public $search;
    public $field = "id";
    public $order = "asc";

    public function render()
    {
        $cars = Car::where('brand', 'like', '%' . $this->search . '%')->orWhere('model', 'like', '%' . $this->search . '%')->orderBy($this->field, $this->order)->get();
        return view('livewire.car-form')->with('cars', $cars);
    }

    public function orderBy($field)
    {
        if ($this->field == $field) {
            if ($this->order == "asc") {
                $this->order = "desc";
            } else {
                $this->order = "asc";
            }
        } else {
            $this->field = $field;
            $this->order = "asc";
        }
    }
}
