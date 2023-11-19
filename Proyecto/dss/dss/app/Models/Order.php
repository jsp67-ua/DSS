<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'orders';
    protected $fillable = [
        'total',
        'user_id',
        'status',
        'payment_method',
    ];
    public function getOrderLines() {
        $o_line = Orderline::where('order_id', $this->id)->get();
        return $o_line;
    }

    public function getProduct() {
        $orderline = DB::table('orderlines')->where('order_id', $this->id)->first();
        return DB::table('products')->where('id', $orderline->product_id)->first();
    }

   public function getUser() {
        $user = DB::table('users')->where('id', $this->user_id)->first();
        return $user;
    }

    public function getId() {
        return $this->id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function orderlines() {
        return $this->hasMany(OrderLine::class);
    }

    public function setTotal($total){
        $this->total = $total;
    }

    public function users() {
        return $this->belongTo(User::class);
    }

    public function updateTotal() {
        $lines = $this->getOrderLines();
        $total = 0;
        foreach($lines as $l)
        {
            $total += $l->total; 
        }
        $this->update([
            'total' => $total,
        ]);
    }
}