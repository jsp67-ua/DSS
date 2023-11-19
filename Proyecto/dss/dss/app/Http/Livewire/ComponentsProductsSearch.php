<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Type;
use Livewire\WithPagination;

class ComponentsProductsSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sortBy;
    public $paginacion;
    public $type;

    public function mount(Type $type)
    {
        $this->sortBy = "default";
        $this->paginacion = 16;
        $this->type = $type;
    }

    public function render()
    {
        if($this->sortBy == 'namedesc')
        {
            $products = Product::where([
                'type_id' => $this->type->id,
            ])->orderBy('name', 'desc')->paginate($this->paginacion);
        }
        else if($this->sortBy == 'priceasc')
        {
            $products = Product::where([
                'type_id' => $this->type->id,
            ])->orderBy('price', 'asc')->paginate($this->paginacion);
        }
        else if($this->sortBy == 'pricedesc')
        {
            $products = Product::where([
                'type_id' => $this->type->id,
            ])->orderBy('price', 'desc')->paginate($this->paginacion);
        }
        else
        {
            $products = Product::where([
                'type_id' => $this->type->id,
            ])->orderBy('name', 'asc')->paginate($this->paginacion);
        }
        
        return view('livewire.components-products-search', ['products' => $products]);
    }
}
