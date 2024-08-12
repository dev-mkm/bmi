<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithoutUrlPagination,WithPagination;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboard', [
            'history' => Auth::user()->history()->paginate(10),
        ]);
    }
}
