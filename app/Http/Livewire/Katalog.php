<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Katalog extends Component
{
    public function render()
    {
        return view('livewire.katalog')
            ->layout('layouts.main', ['title' => 'Katalog']);
    }
}
