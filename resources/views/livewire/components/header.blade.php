<div>
    <header id="header"
        class="fixed w-full flex justify-between px-5 py-6 z-30 top-0 {{ $visibleOnScroll ? '-translate-y-full' : '' }} lg:px-24 lg:py-5 transition-all {{ $showSidebar ? 'header-scroll' : 'header-scroll' }}">
        <a href="{{ route('home') }}">
            <h1 class="text-xl font-bold leading-none uppercase tracking-widest lg:text-2xl">{{ config('app.name') }}
            </h1>
        </a>

        <nav class="hidden sm:flex items-center gap-6">
            @livewire('components.nav-link', ['href' => route('home'), 'active' => request()->routeIs('home'), 'text' => 'home'], 'home')
            @livewire('components.nav-link', ['href' => route('katalog'), 'active' => request()->routeIs('katalog'), 'text' => 'katalog'], 'katalog')
        </nav>

        <nav class="flex justify-center sm:hidden">
            <div class="flex flex-col justify-between items-end w-8 aspect-video cursor-pointer relative sm:hidden"
                wire:click="toggleSidebar">
                <span id="bar"
                    class="block h-0.5 rounded-full bg-stone-800  transition-all duration-300 ease-in-out {{ $showSidebar ? 'w-1/4 ' : 'w-full' }}"></span>
                <span id="bar"
                    class="block h-0.5 rounded-full bg-stone-800  transition-all duration-300 ease-in-out {{ $showSidebar ? 'w-1/2 ' : 'w-full' }}"></span>
                <span id="bar"
                    class="block h-0.5 rounded-full bg-stone-800  transition-all duration-300 ease-in-out {{ $showSidebar ? 'w-3/4 ' : 'w-full' }}"></span>
            </div>

            <ul id="nav"
                class="absolute flex flex-col justify-start items-center w-48 h-screen bg-stone-200 top-full right-0 transition-all duration-300 ease-in-out z-20 {{ $showSidebar ? 'visible translate-x-0' : 'invisible translate-x-full' }}">
                <li class="nav-list ">
                    @livewire('components.nav-link', ['href' => route('home'), 'active' => request()->is('home'), 'text' => 'home'], 'home')
                </li>
                <li class="nav-list">
                    @livewire('components.nav-link', ['href' => route('katalog'), 'active' => request()->is('katalog'), 'text' => 'katalog'], 'katalog')
                </li>

            </ul>

            <div id="screen" for="menu-toggle" wire:click="toggleSidebar"
                class="absolute top-full left-0 right-0 h-screen  bg-black bg-opacity-25 z-10 md:hidden {{ $showSidebar ? 'visible' : 'invisible' }}">
            </div>
        </nav>
    </header>

    @vite('resources/js/header.js')
</div>
