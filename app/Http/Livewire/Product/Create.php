<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
    use WithFileUploads;

    public $show = false;

    public $name;
    public $featured = false;
    public $stock = 1;
    public $category;
    public $price = 10000;
    public $discount = 0;
    public $pictures = [];
    public $uploadedPictures = [];
    public $description;

    public $categoryOptions;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'featured' => 'boolean',
        'stock' => 'required|numeric',
        'category' => 'nullable|exists:product_categories,id',
        'price' => 'required|numeric',
        'discount' => 'required|numeric|min:0|max:100',
        'pictures' => 'array|max:5',
        'pictures.*' => 'image|max:1024', // 1MB Max
        'description' => 'nullable|min:6|max:255'
    ];

    protected $listeners = [
        'showCreate' => 'show',
    ];

    public function mount()
    {
        $this->categoryOptions = \App\Models\ProductCategory::all();
    }

    public function show()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->resetExcept('categoryOptions');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedPictures()
    {
        $this->validate([
            'pictures.*' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function updatedUploadedPictures()
    {
        while ($this->uploadedPictures && count($this->pictures) < 5) {
            array_push($this->pictures, array_shift($this->uploadedPictures));
        }

        if ($this->uploadedPictures) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => 'You can only upload 5 pictures',
            ]);
        }

        $this->reset('uploadedPictures');

        $this->updatedPictures();
    }

    public function removePict($index)
    {
        unset($this->pictures[$index]);

        $this->updatedPictures();
    }

    public function store()
    {

        $this->validate();

        $data = [
            'name' => $this->name,
            'featured' => $this->featured,
            'stock' => $this->stock,
            'product_category_id' => $this->category,
            'price' => $this->price,
            'discount' => $this->discount,
            'description' => $this->description,
        ];


        try {
            $product = \App\Models\Product::create($data);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Failed to create product',
            ]);
            return;
        }

        foreach ($this->pictures as $picture) {
            $path = $picture->storePublicly('product', 'public');

            if (Storage::disk('public')->exists($path)) {
                try {
                    $product->pictures()->create([
                        'path' => $path,
                    ]);
                } catch (\Throwable $th) {
                    Storage::disk('public')->delete($path);
                }
            }
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Product created successfully',
        ]);

        $this->close();
        $this->emitUp('refreshProduct');
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}
