<div>
    {{-- In work, do what you enjoy. --}}
    <header
        class="fixed w-full flex justify-between px-5 py-6 shadow-md rounded-b z-50 top-0 bg-stone-100 lg:px-24 lg:py-10">
        <a href="{{ route('home') }}">
            <h1 class="text-xl font-bold  uppercase tracking-widest lg:text-3xl">Misha Florist</h1>
        </a>

        <nav class="hidden lg:flex gap-6">
            @livewire('components.nav-link', ['href' => route('home'), 'active' => request()->routeIs('home'), 'text' => 'home'], key('home'))
        </nav>

        <nav class="flex justify-center lg:hidden">
            <input type="checkbox" id="hamburger-toggle" class="hidden" />
            <label id="hamburger" for="hamburger-toggle"
                class="flex flex-col justify-center items-center w-10 aspect-video cursor-pointer relative">
                <span id="bar"
                    class="block w-full h-1/6 rounded-full bg-stone-800 my-1 transition-all duration-300 ease-in-out after:block after:w-full after:h-full after:rounded-full after:bg-stone-800 after:translate-y-full after:transition-all after:duration-300 after:ease-in-out before:block before:w-full before:h-full before:rounded-full before:bg-stone-800 before:-translate-y-[200%] before:transition-all before:duration-300 before:ease-in-out"></span>
            </label>
            <label id="screen" for="hamburger-toggle"
                class="hidden fixed inset-0 bg-white blur bg-opacity-25"></label>

            <ul id="nav"
                class="absolute invisible z-10 flex flex-col justify-start items-center w-1/2 h-screen bg-stone-500 top-full right-0 translate-x-full transition-all duration-300 ease-in-out">
                <li class="nav-list">
                    @livewire('components.nav-link', ['href' => route('home'), 'active' => request()->routeIs('home'), 'text' => 'home'], key('home'))
                </li>
                <li class="nav-list">
                    @livewire('components.nav-link', ['href' => route('home'), 'active' => request()->routeIs('home'), 'text' => 'home'], key('home'))
                </li>
                <li class="nav-list">
                    @livewire('components.nav-link', ['href' => route('home'), 'active' => request()->routeIs('home'), 'text' => 'home'], key('home'))
                </li>

            </ul>
        </nav>
    </header>
</div>
