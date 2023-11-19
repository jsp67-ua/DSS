<?php

namespace App\View\Components;

use App\Models\Order;
use Illuminate\View\Component;

class OrderFormBody extends Component
{
    private $order;
    /**
     * Create a new component instance.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function __construct( $order = null )
    {
        if( is_null($order))
        {
            $order = Order::make([]);
        }
        $this->order = $order;
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
            'order'   => $this->order,
        ];
        return view('components.order-form-body', $params);
    }
}
