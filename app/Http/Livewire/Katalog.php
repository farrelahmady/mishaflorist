<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Katalog extends Component
{
    public function render()
    {
        $products = Product::all();

        return view('livewire.katalog', compact('products'))
            ->layout('layouts.main', ['title' => 'Katalog']);
    }
}
