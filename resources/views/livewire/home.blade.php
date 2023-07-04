<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <header class="fixed w-full flex justify-between px-6 py-4 text-light shadow-md rounded-b z-50">
        <a href="{{ route('home') }}">
            <h1 class="text-xl font-bold uppercase">Misha Florist</h1>
        </a>

        <nav class="flex gap-6">
            {{-- @livewire('cpnavlink', ['href' => route('home')], 'home') --}}
            @livewire('components.nav-link', ['href' => route('home'), 'active' => request()->routeIs('home'), 'text' => 'home'], key('home'))
        </nav>
    </header>


</div>
