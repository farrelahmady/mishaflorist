<div>
    <section>
        <form wire:submit.prevent="addProduct">
            <input type="text" value="{{ fake()->name }}">
            <button type="submit">Add</button>
        </form>
    </section>

    <x-card-container>
        @slot('title')
            Product
        @endslot

        <div class="w-full overflow-y-hidden overflow-x-auto">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="table-head">Pictures</th>
                        <th class="table-head">Name</th>
                        <th class="table-head">category</th>
                        <th class="table-head">Normal price</th>
                        <th class="table-head">discount</th>
                        <th class="table-head">Discounted Price</th>
                        <th class="table-head">stock</th>
                        <th class="table-head">Featured</th>
                        <th class="table-head">description</th>
                        <th class="table-head">action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="table-data">
                                <div class="flex flex-wrap gap-1 items-center">
                                    @foreach ($product->pictures as $picture)
                                        <img class="aspect-video h-8 object-cover inline-block"
                                            src="{{ $picture->url }}" alt="{{ $picture->name }}">
                                    @endforeach
                                </div>
                            </td>
                            <td class="table-data capitalize">{{ $product->name }}</td>
                            <td class="table-data capitalize">
                                @if ($product->category)
                                    {{ $product->category->name }}
                                @endif
                            </td>
                            <td class="table-data capitalize">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="table-data capitalize">{{ $product->discount }}%</td>
                            <td class="table-data capitalize">Rp
                                {{ number_format($product->discounted_price, 0, ',', '.') }}</td>
                            <td class="table-data capitalize">{{ $product->quantity }}</td>
                            <td class="table-data capitalize">
                                @php
                                    $style = $product->is_featured ? 'text-green-600 bg-green-200' : 'text-red-600 bg-red-200';
                                @endphp

                                @livewire(
                                    'components.badge-dropdown',
                                    [
                                        'width' => 'w-28',
                                        'style' => $style,
                                        'options' => [
                                            [
                                                'text' => 'Not Featured',
                                                'value' => 0,
                                                'style' => 'text-red-600 bg-red-200',
                                            ],
                                            [
                                                'text' => 'Featured',
                                                'value' => 1,
                                                'style' => 'text-green-600 bg-green-200',
                                            ],
                                        ],
                                        'selected' => $product->is_featured,
                                        'data' => $product->id,
                                        'onSelect' => 'changeFeatured',
                                    ],
                                    key($product->id . now())
                                )
                            </td>
                            <td class="table-data">
                                {{ $product->description }}
                            </td>
                            <td class="table-data ">
                                <div class="flex  items-center">
                                    <span
                                        class="flex justify-between items-center text-xs font-semibold py-1 px-2 rounded uppercase last:mr-0 mr-1 w-fit text-stone-100 cursor-pointer bg-blue-400 hover:bg-blue-500">
                                        Edit
                                    </span>
                                    <span wire:click="delete({{ $product->id }})"
                                        class="flex justify-between items-center text-xs font-semibold py-1 px-2 rounded uppercase last:mr-0 mr-1 w-fit text-stone-100 cursor-pointer bg-red-400 hover:bg-red-500">Delete</span>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $products->links() }}
    </x-card-container>
</div>
