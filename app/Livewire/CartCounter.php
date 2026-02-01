<?php

namespace App\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
    public $count = 0;

    protected $listeners = ['cartUpdated' => 'updateCount'];

    public function mount()
    {
        $this->count = collect(session('cart', []))->sum('quantity');
    }

    public function updateCount()
    {
        $this->count = collect(session('cart', []))->sum('quantity');
    }

    public function render()
    {
        return view('livewire.cart-counter');
    }
}