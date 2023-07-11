<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
	use WithFileUploads;

	public $name;
	public $stock;
	public $category;
	public $price = 10000;
	public $discount = 0;
	public $pictures = [];
	public $uploadedPictures = [];
	public $description;

	public $categoryOptions;

	protected $rules = [
		'name' => 'required|min:3|max:255',
		'stock' => 'required|numeric',
		'category' => 'exists:product_categories,id',
		'price' => 'required|numeric',
		'discount' => 'required|numeric|min:0|max:100',
		'pictures' => 'array|max:5',
		'pictures.*' => 'image|max:1024', // 1MB Max
		'description' => 'nullable|min:6|max:255'
	];

	public function mount()
	{
		$this->categoryOptions = \App\Models\ProductCategory::all();
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
			'stock' => $this->stock,
			'category_id' => $this->category,
			'price' => $this->price,
			'discount' => $this->discount,
			'description' => $this->description,
		];

		$product = \App\Models\Product::create($data);

		foreach ($this->pictures as $picture) {
			$product->pictures()->create([
				'path' => $picture->storePublicly('product'),
			]);
		}

		$this->dispatchBrowserEvent('alert', [
			'type' => 'success',
			'message' => 'Product created successfully',
		]);
	}

	public function render()
	{
		return view('livewire.product.create');
	}
}
