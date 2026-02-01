<?php

namespace App\Livewire;
use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;

class ProductSearch extends Component
{
    use WithPagination;

    public $query = ''; // search input

    protected $updatesQueryString = ['query'];

    public function updatingQuery()
    {
        $this->resetPage(); // reset pagination on new search
    }

    public function render()
    {
        $products = Product::where('Name', 'like', '%' . $this->query . '%')
            ->orWhere('Description', 'like', '%' . $this->query . '%')
            ->orderBy('Name')
            ->paginate(12);

        return view('livewire.product-search', ['products' => $products]);
    }
}
