<div class="">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16 bg-white rounded-md">
        <form wire:submit.prevent="store">
            <div class="flex justify-between">
                <h2 class="mb-4 text-xl font-bold text-gray-900 ">Add a new product</h2>
                <div class="flex items-center mb-4">
                    <input id="featured" type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-teal-500 border-gray-300 rounded focus:ring-teal-500 focus:ring-2 focus:ring-offset-1">
                    <label for="featured" class="ml-2 text-sm font-medium text-gray-900">Featured</label>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-5 sm:gap-x-2 sm:gap-y-4">
                <div class="sm:col-span-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product
                        Name</label>
                    <input type="text" name="name" id="name" wire:model.debounce.300ms="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5"
                        placeholder="Type product name">
                    @error('name')
                        <span class="invalid-message">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 ">Stock</label>
                    <input type="number" name="stock" id="stock" wire:model.debounce.300ms="stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5"
                        placeholder="12" min="0">
                    @error('stock')
                        <span class="invalid-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                    <select id="category" wire:model="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 cursor-pointer capitalize">
                        <option value="" class="hidden">Select category</option>
                        <option value="">None</option>
                        @foreach ($categoryOptions as $option)
                            <option value="{{ $option->id }}" class="capitalize">{{ $option->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="invalid-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                            Rp
                        </span>
                        <input type="number" name="price" id="price" wire:model.debounce.300ms="price"
                            class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-teal-500 focus:border-teal-500 block flex-1 min-w-0 w-full text-sm p-2.5 outline-none"
                            placeholder="Rp 100000" step="10000">
                    </div>
                    @error('price')
                        <span class="invalid-message">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 ">Discount</label>
                    <div class="flex">
                        <input type="number" name="discount" id="discount" wire:model.debounce.300ms="discount"
                            class="rounded-none rounded-l-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-teal-500 focus:border-teal-500 block flex-1 min-w-0 w-full text-sm p-2.5 outline-none"
                            placeholder="0" min="0" max="100">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-lg">
                            %
                        </span>
                    </div>
                    @error('discount')
                        <span class="invalid-message">{{ $message }}</span>
                    @enderror
                </div>


                <div class="sm:col-span-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="pictures">Upload
                        pictures (Max: 5)</label>
                    @if ($pictures)
                        <div id="image-temp-container" class="grid grid-cols-5 gap-2 mb-2">
                            @foreach ($pictures as $i => $picture)
                                @if (str_contains($picture->getMimeType(), 'image'))
                                    <div class="relative group h-32">
                                        <div
                                            class="absolute inset-0 opacity-0 bg-black bg-opacity-20 flex flex-col gap-1 justify-center items-center group-hover:opacity-100 transition-all ease-in-out">
                                            <span class="badge badge-danger clickable"
                                                wire:click="removePict({{ $i }})">Remove</span>
                                            <a href="{{ $picture->temporaryUrl() }}" target="_blank"
                                                rel="noopener noreferrer" class="badge badge-info clickable">
                                                View
                                            </a>
                                        </div>
                                        <img src="{{ $picture->temporaryUrl() }}"
                                            class="rounded h-full w-full object-cover">
                                    </div>
                                @else
                                    <div>
                                        {{ $picture->getClientOriginalName() }}
                                        <span class="invalid-message">File type not supported</span>
                                    </div>
                                @endif
                            @endforeach
                            @if (count($pictures) < 5)
                                <div
                                    class="h-full border-2 border-dashed text-gray-200 text-6xl flex items-center justify-center rounded ">
                                    <label for="pictures">
                                        <i class="fa-solid fa-plus"></i>
                                    </label>
                                    <input id="pictures" wire:model="uploadedPictures" class="hidden" type="file"
                                        multiple>
                                </div>
                            @endif
                        </div>
                    @else
                        <input id="pictures" wire:model="uploadedPictures"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5 cursor-pointer"
                            type="file" multiple>
                    @endif
                    @foreach ($errors->get('pictures') as $error)
                        <span class="invalid-message">{{ $error }}</span>
                    @endforeach
                    @foreach ($errors->get('pictures.*') as $error)
                        @foreach ($error as $e)
                            <span class="invalid-message">{{ $e }}</span>
                        @endforeach
                    @endforeach

                </div>

                <div class="sm:col-span-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                    <textarea id="description" rows="8" wire:model.debounce.300ms="description"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500"
                        placeholder="Your description here"></textarea>
                    @error('description')
                        <span class="invalid-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-5 justify-self-end">
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-teal-200 dark:focus:ring-teal-900 hover:bg-teal-800 ">
                        Add product
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
