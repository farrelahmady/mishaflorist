<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'tailwind';

    protected $listeners = [
        'changeFeatured' => 'changeFeatured',
        'refreshParent' => '$refresh'
    ];

    public function changeFeatured(ModelsProduct $product, $req)
    {
        // dd($product, $req);

        $product->update([
            'is_featured' => $req
        ]);

        return redirect()->route('admin.products');
    }

    public function render()
    {
        $products = ModelsProduct::where('name', 'like', '%' . $this->search . '%');

        $products = $products->latest()->paginate(10);

        return view('livewire.admin.product', [
            'products' => $products
        ])->layout('layouts.admin', ['title' => 'Product']);
    }
}
