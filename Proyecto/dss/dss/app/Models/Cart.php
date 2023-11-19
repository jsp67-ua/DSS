<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'carts';

    protected $fillable = [
        'total',
        'user_id',
    ];

    public function getCartLines() {
       $c_line = CartLine::where('cart_id', $this->id)->get();
       return $c_line;
    }

    public function getProduct() {
        $cart_line = DB::table('cart_lines')->where('cart_id', $this->id)->first();
        return DB::table('products')->where('id', $cart_line->product_id)->first();
    }


    public function getUser() {
        $user = DB::table('users')->where('id', $this->user_id)->first();
        return $user;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function cart_lines() {
        return $this->hasMany(CartLine::class);
    }

    public function users() {
        return $this->belongTo(User::class);
    }

    public function getTotal(){
        return $this->total;
    }

    public function updateTotal() {
        $lines = $this->getCartLines();
        $total = 0.0;
        foreach($lines as $l)
        {
            $total += $l->total; 
        }
        $this->update([
            'total' => $total,
        ]);
    }
}