<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use App\Models\Product;
use App\Models\Supplier;
use Tests\TestCase;
use Iluminate\Foundation\Testing\DatabaseMigrations;
use Iluminate\Foundation\Testing\DatabaseTransactions;


class SupplierTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
    public function test_data_1()
    {
        $su = new Supplier();

        $su->name = 'PCcomponentes';
        $su->description = 'Gran proveedor';
        $su->email = 'PCcomponentes@gmail.com';
        $su->phone = '658428513';
        $su->save();
        try{
            $this->assertEquals($su->name, 'PCcomponentes');
            $this->assertEquals($su->description, 'Gran proveedor');
            $this->assertEquals($su->email, 'PCcomponentes@gmail.com');
            $this->assertEquals($su->phone, '658428513');
        } finally{
            $su->delete();
        }
    }

    public function test_data_2()
    {
        $su = new Supplier();

        $su->name = 'Samsung';
        $su->description = 'Proveedor nuevo';
        $su->email = 'Samsung@gmail.com';
        $su->phone = '932561258';
        $su->save();

        $aux = Supplier::find($su->id);
        try{
            $this->assertNotEquals($aux, NULL);
            $this->assertEquals($aux->name, 'Samsung');
            $this->assertEquals($aux->description, 'Proveedor nuevo');
            $this->assertEquals($aux->email, 'Samsung@gmail.com');
            $this->assertEquals($aux->phone, '932561258');
        } finally{
            $su->delete();
        }
    }

    public function test_data_3()
    {
        $su = new Supplier();

        $su->name = 'HP';
        $su->description = 'Proveedor veterano';
        $su->email = 'HPenterprise@gmail.com';
        $su->phone = '956142769';
        $su->save();
        $su->delete();

        $aux = Supplier::find($su->id);

        $this->assertEquals($aux, NULL);
    }
}
