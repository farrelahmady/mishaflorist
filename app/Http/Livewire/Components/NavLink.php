<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class NavLink extends Component
{
    public string $href;
    public string $text;
    public bool $active;

    public function mount(string $href, string $text, bool $active = false)
    {
        $this->href = $href;
        $this->text = $text;
        $this->active = $active;
    }

    public function render()
    {
        return view('livewire.components.nav-link');
    }
}
