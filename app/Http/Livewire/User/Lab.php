<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Lab extends Component
{
    public $judulku;

    public function render()
    {
        $this->judulku = "okay";
        return view('livewire.user.lab');
    }
}
