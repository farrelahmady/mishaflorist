<div class="relative {{ $width ?? 'w-28' }}">
    <span wire:click="toggle "
        class="flex justify-between items-center text-xs font-semibold py-1 px-2 rounded {{ $options[$selected]['style'] ?? 'bg-white border' }} uppercase last:mr-0 mr-1 w-full cursor-pointer livewire-dropdown relative {{ $show ? 'z-20' : '' }}">
        {{ $options[$selected]['text'] ?? 'Select' }}

        <i class="fa-solid fa-angle-down"></i>
    </span>

    <div class="fixed bg-transparent z-10 inset-0 {{ $show ? 'visible' : 'invisible' }}" wire:click="toggle"></div>
    <ul
        class="flex flex-col absolute z-10 shadow-lg border bg-white w-full rounded translate-y-0.5 transition-all ease-in-out {{ $show ? 'visible opacity-100 translate-y-2' : 'invisible opacity-0 translate-y-1/2' }}">
        @foreach (array_filter($options, fn($key) => $key['value'] != $selected) as $index => $option)
            <li>
                <span wire:click="select({{ $option['value'] }})"
                    class="text-xs font-semibold inline-block py-1 px-2 rounded uppercase last:mr-0 mr-1 hover:text-teal-600 hover:bg-stone-100 cursor-pointer w-full">
                    {{ $option['text'] }}
                </span>
            </li>
        @endforeach
    </ul>
</div>
