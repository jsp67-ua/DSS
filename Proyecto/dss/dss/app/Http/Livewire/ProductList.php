<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductList extends Component
{
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';
    public $paginacion;
    public $search = "";
    public $sortBy;
    protected $queryString = 
    [
        'search' => ['except' => '', 'as' => 'search'],
        'paginacion' => ['except' => 16, 'as' => 'page'],
    ];

    public function mount(Product $product)
    {
        $this->sortBy = "default";
        $this->paginacion = 16;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if($this->sortBy == 'namedesc')
        {
            $products = Product::where('name', 'LIKE', '%'.$this->search.'%')->orderBy('name', 'desc')->paginate($this->paginacion);
        }
        else if($this->sortBy == 'priceasc')
        {
            $products = Product::where('name', 'LIKE', '%'.$this->search.'%')->orderBy('price', 'asc')->paginate($this->paginacion);
        }
        else if($this->sortBy == 'pricedesc')
        {
            $products = Product::where('name', 'LIKE', '%'.$this->search.'%')->orderBy('price', 'desc')->paginate($this->paginacion);
        }
        else
        {
            $products = Product::where('name', 'LIKE', '%'.$this->search.'%')->orderBy('name', 'asc')->paginate($this->paginacion);
        }
        return view('livewire.product-list', ['products' => $products]);
    }
}