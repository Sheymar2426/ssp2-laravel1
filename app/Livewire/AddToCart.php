<?php

namespace App\Livewire;

use Livewire\Component;

class AddToCart extends Component
{
    public $productId;

    protected $listeners = ['cartUpdated' => '$refresh'];

    public function addToCart()
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$this->productId])){
            $cart[$this->productId]['quantity']++;
        } else {
            $product = Product::find($this->productId);
            if(!$product) return;

            $cart[$this->productId] = [
                'id' => $product->ProductId,
                'name' => $product->Name,
                'price' => $product->Price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}