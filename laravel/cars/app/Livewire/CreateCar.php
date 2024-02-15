<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class CreateCar extends Component
{
    use WithFileUploads;

    #[Validate('required | min:7 | max:7')]
    public $plate;
    
    public $brand, $model;

    #[Validate('required | numeric')]
    public $year;

    public $last_revision_date, $photo, $price;
    public $show = false;

    public function render()
    {
        return view('livewire.create-car');
    }

    public function showForm()
    {
        $this->show = !$this->show;
    }

    public function save()
    {
        $photoName = time() . "-" . $this->photo->getClientOriginalName();
        $this->photo->storeAs('public/img_car', $photoName);

        Car::create([
            'plate' => $this->plate,
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year,
            'last_revision_date' => $this->last_revision_date,
            'photo' => $photoName,
            'price' => $this->price,
            'user_id' => Auth::id()
        ]);

        $this->dispatch('updateList');
        $this->showForm();
        $this->reset('plate', 'brand', 'model', 'year', 'last_revision_date', 'photo', 'price');
    }
}
