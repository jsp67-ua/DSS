<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderUserIndex extends Component
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
            return view('livewire.orderuser-index', [
                //'orders'  => Order::where('id', Auth::user()->id)->paginate($this->paginacion),
                'orders'  => Order::where('user_id', 14)->paginate($this->paginacion),
            ]);
        } 
    
}
