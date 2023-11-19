<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\Product;
use Tests\TestCase;
use Iluminate\Foundation\Testing\DatabaseMigrations;
use Iluminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_data_1()
    {
        $pr = new Product();
        $pr->name = "Pantalla Samsung";
        $pr->description = "Buena marca";
        $pr->price= 25.00;
        $pr->stock = 5;
        $pr->save();
        try{
            $this->assertEquals($pr->name, "Pantalla Samsung");
            $this->assertEquals($pr->description, "Buena marca");
            $this->assertEquals($pr->price, 25.00);
            $this->assertEquals($pr->stock, 5);
        } finally{
            $pr->delete();
        }
    }

    public function test_data_2()
    {
        $pr = new Product();
        $pr->name = 'Torre omen HP';
        $pr->description = 'Gran calidad';
        $pr->price= 150.00;
        $pr->stock = 8;
        $pr->save();

        $aux = Product::find($pr->id);
        try{
            $this->assertNotEquals($aux, NULL);
            $this->assertEquals($aux->name, 'Torre omen HP');
            $this->assertEquals($aux->description, 'Gran calidad');
            $this->assertEquals($aux->price, 150.00);
            $this->assertEquals($aux->stock, 8);
        } finally{
            $pr->delete();
        }
    }

    public function test_data_3()
    {
        $pr = new Product();
        $pr->name = 'Raton logitech';
        $pr->description = 'Buen raton';
        $pr->price= 40.00;
        $pr->stock = 3;
        $pr->save();
        $pr->delete();

        $aux = Product::find($pr->id);
        
        $this->assertEquals($aux, NULL);
    }
}
