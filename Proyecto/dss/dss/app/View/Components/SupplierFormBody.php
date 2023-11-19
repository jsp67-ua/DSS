<?php

namespace App\View\Components;

use App\Models\Supplier;
use Illuminate\View\Component;

class SupplierFormBody extends Component
{
    private $supplier;
    /**
     * Create a new component instance.
     *
     * @param \App\Models\Supplier $supplier
     * @return void
     */
    public function __construct( $supplier = null )
    {
        if( is_null($supplier))
        {
            $supplier = Supplier::make([]);
        }
        $this->supplier = $supplier;
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
            'supplier'   => $this->supplier,
        ];
        return view('components.supplier-form-body', $params);
    }
}
