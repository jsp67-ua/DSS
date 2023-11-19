<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Events\CartLineAdded;
use App\Events\CartAdded;

class CartLine extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cart_lines';

    protected $fillable = [
        'amount',
        'total',
        'product_id',
        'cart_id',
    ];

    public function getProduct() {
        return Product::find($this->product_id);
    }
    
    public function getAmount() {
        return $this->amount;;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function products() {
        return $this->hasOne(Product::class);
    }

    public function carts() {
        return $this->belongTo(Cart::class);
    }

    public function getTotal(){
        return $this->total;
    }

    public function updateTotal(){
        $product = $this->getProduct();
        $this->total = $this->amount * $product->price;
        $this->save();
        event(new CartAdded(Cart::find($this->cart_id)));
    }
}
