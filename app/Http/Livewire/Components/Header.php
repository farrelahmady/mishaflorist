<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Header extends Component
{
    public bool $visibleOnScroll = false;

    public function render()
    {
        return view('livewire.components.header', [
            'visibleOnScroll' => $this->visibleOnScroll,
        ]);
    }
}
