<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'types';
    protected $fillable = [
        'name',
        'description',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function getProducts() {
        $p = Product::where('type_id', $this->id)->get();
        return $p;
    }
}
