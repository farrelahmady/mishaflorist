<div>

    @livewire('product.edit', [], key('edit' . now()))

    <x-card-container>
        @slot('title')
            Product
        @endslot

        @slot('additionHeader')
            @livewire('product.create', [], key('create' . now()))
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
                            <td class="table-data max-w-fit">
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
                            <td class="table-data capitalize">{{ $product->stock }}</td>
                            <td class="table-data capitalize">
                                @php
                                    $style = $product->featured ? 'text-green-600 bg-green-200' : 'text-red-600 bg-red-200';
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
                                        'selected' => $product->featured,
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
                                <div class="flex  items-center gap-1">
                                    <span class="badge clickable badge-info" wire:click="edit('{{ $product->id }}')">
                                        Edit
                                    </span>
                                    <span wire:click="deleteProduct('{{ $product->id }}')"
                                        class="badge clickable badge-danger">Delete</span>
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
