<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product as ProductModel;
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

    public function render()
    {
        $products = ProductModel::where('name', 'like', '%' . $this->search . '%');

        $products = $products->latest()->paginate(10);

        return view('livewire.admin.product', [
            'products' => $products
        ])->layout('layouts.admin', ['title' => 'Product']);
    }

    public function changeFeatured($product, $req)
    {
        $product = ProductModel::find($product);
        $product->update([
            'is_featured' => $req
        ]);

        session()->flash('message', 'Post Updated Successfully.');
    }

    public function addProduct()
    {
        ProductModel::factory()->create();

        session()->flash('message', 'Post Created Successfully.');
    }
}
