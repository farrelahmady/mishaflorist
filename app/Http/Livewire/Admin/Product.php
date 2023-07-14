<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product as ProductModel;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    public $search;
    public $showCreate = true;

    protected $paginationTheme = 'tailwind';

    protected $listeners = [
        'changeFeatured' => 'changeFeatured',
        'delete' => 'deleteProduct',
        'refreshProduct' => '$refresh',
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
            'featured' => $req
        ]);

        $message = $req ? 'Featured' : 'Unfeatured';
        $product = $product->name;

        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Successfully Set <strong>'$product'</strong> as <strong>$message Product.</strong>"]);
    }

    public function deleteProduct($id)
    {
        $product = ProductModel::find($id);
        $product->delete();

        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Successfully Delete <strong>'$product->name'</strong>"]);

        $this->emit('refreshProduct');
    }
}
