<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductIndex extends Component
{
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';
    public $paginacion = 10;
    public $search;
    protected $queryString = 
    [
        'search' => ['except' => '', 'as' => 'search'],
        'paginacion' => ['except' => 10, 'as' => 'page'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.product-index', [
            'products'  => Product::where('name', 'LIKE', '%'.$this->search.'%')->paginate($this->paginacion),
        ]);
    }
}