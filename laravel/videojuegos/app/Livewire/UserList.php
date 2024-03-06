<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Component;

class UserList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $name;
    public $search;
    public $field = "id";
    public $order = "asc";

    #[On('updateList')]
    public function render()
    {
        $users = User::where('id', '!=', Auth::id())->where(function ($query) {
            $query->where('dni', 'like', '%' . $this->search . '%')->orWhere('name', 'like', '%' . $this->search . '%')->orWhere('surname', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%');
        })->orderBy($this->field, $this->order)->paginate(3);

        return view('livewire.user-list')->with('users', $users);
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
