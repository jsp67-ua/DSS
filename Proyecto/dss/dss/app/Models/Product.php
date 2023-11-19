<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'type_id',
        'name', 
        'description', 
        'image',
        'price', 
        'stock'
    ];

    public function types() {
        return $this->belongTo(Type::class);
    }

    public function suppliers() {
        return $this->belongsToMany(Supplier::class, 'products_suppliers'); //Relación a muchos con la clase Supplier mediante la tabla products_suppliers
    }

    public function cart_lines() {
        return $this->belongsToMany(CartLine::class);
    }

    public function getTypes() {
        $t = DB::table('types')->where('id', $this->type_id)->first();
        return $t;
    }

    public function getStock() {
        return $this->stock;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }
}