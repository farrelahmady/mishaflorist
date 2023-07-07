<div class="mt-20 pb-4 md:p-8">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="flex justify-center md:gap-4 lg:gap-8">
        <div class="border rounded-sm  h-fit shadow-sm bg-white hidden md:block">
            <h2 class="p-2 border-b">Filter</h2>
            <div class="p-2">
                <div class="p-2">
                    <h3>Promo</h3>
                    <div class="flex gap-2">
                        <input id="Diskon" type="checkbox">
                        <label for="Diskon">Diskon</label>
                    </div>

                </div>
                <div class="p-2">
                    <h3>Promo</h3>
                    <div class="flex gap-2">
                        <input id="Diskon" type="checkbox">
                        <label for="Diskon">Diskon</label>
                    </div>
                </div>

                <button
                    class="w-full flex items-center justify-center rounded-sm bg-stone-800 px-3 py-2 text-center text-sm font-medium text-white hover:opacity-75 transition-opacity ease-in-out duration-500 mt-2">
                    Terapkan</button>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <div class="flex gap-1 items-center md:gap-2">
                <div class="border-2 rounded-lg bg-white flex flex-1 ">
                    <input type="text" class="bg-transparent flex-1 p-2 outline-none" placeholder="Search...">
                </div>

                <div class="border-2 rounded-lg bg-white hidden md:flex ">
                    <select class="bg-transparent flex-1 p-2 outline-none w-40 md:w-60">
                        <option value="">Urutkan</option>
                        <option value="">Sort By</option>
                        <option value="">Sort By</option>
                        <option value="">Sort By</option>
                    </select>
                </div>

                <div class="md:hidden">
                    <input type="checkbox" id="filter-toggle" class="hidden" />
                    <label for="filter-toggle">
                        <i class="fa-solid fa-filter text-xl"></i>
                    </label>
                    <label id="screen" for="filter-toggle"
                        class="fixed invisible inset-0 h-screen bg-black bg-opacity-25 z-10"></label>

                    <div id="filter-box"
                        class="flex flex-col bg-white p-4 fixed bottom-0 left-0 right-0 z-50 rounded-t-lg max-h-96 invisible translate-y-full transition-all ease-in-out">
                        <div class="overflow-auto">
                            <div class="p-2 ">
                                <h3>Urutkan Berdasarkan</h3>
                                <div class="flex flex-wrap gap-2">
                                    <div class="flex gap-2 flex-1">
                                        <input id="Diskon" type="radio">
                                        <label for="Diskon" class="whitespace-nowrap">Urutan</label>
                                    </div>
                                </div>

                            </div>

                            <div class="p-2 ">
                                <h3>Promo</h3>
                                <div class="flex flex-wrap gap-2">
                                    <div class="flex gap-2 flex-1">
                                        <input id="Diskon" type="checkbox">
                                        <label for="Diskon" class="whitespace-nowrap">Diskon</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <button
                                class="w-full flex items-center justify-center rounded-sm bg-stone-800 px-3 py-2 md:px-5 md:py-3 text-center text-sm font-medium text-white hover:opacity-75 transition-opacity ease-in-out duration-500">
                                Terapkan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="grid grid-cols-2 gap-2 md:gap-5 justify-items-center sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                {{-- <div class="flex flex-wrap w-fit justify-start gap-2 lg:gap-4"> --}}
                @for ($i = 0; $i < 50; $i++)
                    @livewire('product.card')
                @endfor
            </div>
        </div>

    </div>
</div>
