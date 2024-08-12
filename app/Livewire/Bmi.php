<?php

namespace App\Livewire;

use App\Models\BMI as BMIModel;
use Livewire\Component;

class Bmi extends Component
{
    public BMIModel $bmi;

    public function mount(BMIModel $bmi)
    {
        $this->bmi = $bmi;
    }

    public function render()
    {
        return view('livewire.bmi');
    }
}
