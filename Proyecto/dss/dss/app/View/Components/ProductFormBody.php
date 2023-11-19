<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Type;
use Illuminate\View\Component;

class ProductFormBody extends Component
{
    private $product;
    private $type;
    public $suppliers;
    /**
     * Create a new component instance.
     *
     * @param \App\Models\Product $product
     * @return void
     */
    public function __construct( $product = null )
    {
        $type = Type::all();
        $suppliers = Supplier::all();
        if( is_null($product))
        {
            $product = Product::make([]);
        }
        $this->product = $product;
        $this->suppliers = $suppliers;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $params =
        [
            'type'      => $this->type,
            'product'   => $this->product,
            'suppliers' => $this->suppliers,
        ];
        return view('components.product-form-body', $params);
    }
}
