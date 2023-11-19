<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\Product;
use App\Models\Cart;
use Tests\TestCase;
use Iluminate\Foundation\Testing\DatabaseMigrations;
use Iluminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class CartTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_data_1()
    {
        $ca = new Cart();
        $ca->total = 15.00;
        $ca->save();

        try{
            $this->assertEquals($ca->total, 15);
        } finally{
            $ca->delete();
        }
    }

    public function test_data_2()
    {
        $ca = new Cart();
        $ca->total= 20.00;
        $ca->save();

        $aux = Cart::find($ca->id);
        try{
            $this->assertNotEquals($aux, NULL); 
            $this->assertEquals($aux->total, 20.00);
        } finally{
            $ca->delete();
        }
    }

    public function test_data_3()
    {
        $ca = new Cart();
        $ca->total= 30.00;
        $ca->save();
        $ca->delete();
        $aux = Cart::find($ca->id);
        
        $this->assertEquals($aux, NULL);
        
    }
}
