<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Orderline extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'orderlines';
    protected $fillable = [
        'amount',
        'total',
        'product_id',
        'order_id',
    ];

    public function getProduct() {
        return DB::table('products')->where('id', $this->product_id)->first();
    }

    public function getId() {
        return $this->id;
    }

    public function product() {
        return $this->hasOne(Product::class);
    }

    public function order() {
        return $this->belongTo(Order::class);
    }

    public function setAmount($amount){
        $this->amount = $amount;
    }

    public function setTotal($total){
        $this->total = $total;
    }

    public function setOrderId($order_id){
        $this->order_id = $order_id;
    }

    public function setProductId($product_id){
        $this->product_id = $product_id;
    }

    public function updateTotal(){
        $product = $this->getProduct();
        $this->total = $this->amount * $product->price;
        $this->save();
    }
}