<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use Livewire\Attributes\On;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CarForm extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $name;
    public $search;
    public $field = "id";
    public $order = "asc";

    #[On('updateList')]
    public function render()
    {
        $cars = Car::where('brand', 'like', '%' . $this->search . '%')->orWhere('model', 'like', '%' . $this->search . '%')->orderBy($this->field, $this->order)->paginate(3);

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

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
