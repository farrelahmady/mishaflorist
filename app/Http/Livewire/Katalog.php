<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Katalog extends Component
{
    public $filter = [
        'search' => '',
        'discount' => false,
    ];

    public function render()
    {
        $products = Product::query();
        if ($this->filter) {
            $filter = $this->filter;
            if ($filter['search']) {
                $products = $products->where('name', 'like', '%' . $filter['search'] . '%');
            }
            if ($filter['discount']) {
                $products = $products->where('discount', '>', 0);
            }
        }
        $products = $products->get();

        return view('livewire.katalog', compact('products'))
            ->layout('layouts.main', ['title' => 'Katalog']);
    }
}
