<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use SebastianBergmann\Type\FalseType;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'admin',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'admin',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts(){
        return $this->hasOne(Cart::class, 'user_id');
    }
    
    public function order(){
        return $this->hasMany(Order::class, 'user_id');
    }

    public function isAdmin(){
        return $this->admin;
    }
   
    public function getUser($user_id) {
        $user = DB::table('user')->where('id', $user_id)->first();
        return $user;
    }

    public function getCart() {
        
        $cart = Cart::firstOrCreate([
            'user_id' => $this->id,
        ], [
            'user_id' => $this->id,
        ]);
       
        return $cart;
    }

    public function getOrder() {
        $p = Order::where('user_id', $this->id)->get();
        return $p;
    }
}

    
