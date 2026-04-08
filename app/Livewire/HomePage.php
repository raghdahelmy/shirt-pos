<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'indexProducts' => Product::latest()->take(4)->get(),
        ]);
    }
}