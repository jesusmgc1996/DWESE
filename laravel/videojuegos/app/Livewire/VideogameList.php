<?php

namespace App\Livewire;

use App\Models\Videogame;
use Livewire\Attributes\On;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Component;

class VideogameList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $name;
    public $search;
    public $field = "id";
    public $order = "asc";

    #[On('updateList')]
    public function render()
    {
        $videogames = Videogame::where('name', 'like', '%' . $this->search . '%')->orWhere('year', 'like', '%' . $this->search . '%')->orderBy($this->field, $this->order)->paginate(3);

        return view('livewire.videogame-list')->with('videogames', $videogames);
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
