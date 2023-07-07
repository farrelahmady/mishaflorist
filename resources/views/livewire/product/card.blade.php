    <div
        class="relative flex w-40 md:w-48 lg:w-60 flex-col overflow-hidden rounded-sm border border-gray-100  shadow-md">
        {{-- <div class="relative flex w-full max-w-xs flex-col overflow-hidden rounded-sm border border-gray-100  shadow-md"> --}}
        <a class="relative w-full flex h-32 md:h-60 overflow-hidden " href="#">
            <img class="object-cover w-full" src="{{ $product->pictures->first()->url }}" alt="product image" />
            <span
                class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white @if (!$product->discount) hidden @endif">Diskon
                {{ $product->discount }}%</span>
        </a>
        <div class="p-3">
            <a href="#">
                <h5 class="text-base  lg:text-xl tracking-tight text-stone-900 capitalize">{{ $product->name }}
                    {{ $product->category->name ? '- ' . $product->category->name : '' }}
                </h5>
            </a>
            <div class="mt-2 mb-5 flex items-center justify-between">
                <p class="flex flex-col lg:block">
                    <span class="text-lg md:text-xl font-bold text-stone-900">Rp
                        {{ number_format($product->discounted_price, 0, ',', '.') }}</span>
                    <span class="text-xs text-stone-900 line-through @if (!$product->discount) hidden @endif">Rp
                        {{ number_format($product->price, 0, ',', '.') }}</span>
                </p>
            </div>
            <a href="#"
                class="flex items-center justify-center rounded-sm bg-stone-800 px-3 py-2 md:px-5 md:py-3 text-center text-sm font-medium text-white hover:opacity-75 transition-opacity ease-in-out duration-500">
                Pesan Sekarang</a>

        </div>
    </div>
