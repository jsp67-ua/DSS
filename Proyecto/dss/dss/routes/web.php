<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartLineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TypeController;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckCartController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get('main/aboutus', function () {
    return view('aboutus');
})->name('main.aboutus');

Route::get('main/login', function () {
    return view('login');
})->name('login');

Route::get('main/register', function () {
    return view('register');
})->name('register');

Route::get('main/myprofile', function () {
    return view('myprofile');
})->name('myprofile');

Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('admin/main', function () {
        return view('admin');
    })->name('admin.main');
    
    // Rutas creadas para el admin.
    Route::get('type/create', [TypeController::class, 'create'])->name('type.create');
    Route::post('type/save', [TypeController::class, 'store'])->name('type.store');
    Route::get('type/list', [TypeController::class, 'index'])->name('type.index');
    Route::get('type/{type}/edit', [TypeController::class, 'edit'])->name('type.edit');
    Route::put('type/{type}/update', [TypeController::class, 'update'])->name('type.update');
    Route::get('type/{type}/show', [TypeController::class, 'show'])->name('type.show');
    Route::delete(('type/{type}/delete'), [TypeController::class, 'destroy'])->name('type.destroy');

    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/save', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/list', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/{product}/show', [ProductController::class, 'show'])->name('product.show');
    Route::delete(('product/{product}/delete'), [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('supplier/save', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('supplier/list', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('supplier/{supplier}/update', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('supplier/{supplier}/show', [SupplierController::class, 'show'])->name('supplier.show');
    Route::delete(('supplier/{supplier}/delete'), [SupplierController::class, 'destroy'])->name('supplier.destroy');
    Route::get('order/list', [OrderController::class, 'index'])->name('order.index');

    Route::get('order/{order}/show', [OrderController::class, 'show'])->name('order.show');
    Route::delete('order/{order}/delete', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::put('order/{order}/update', [OrderController::class, 'update'])->name('order.update');
    Route::get('order/{order}/edit', [OrderController::class, 'edit'])->name('order.edit');
    Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('order/save', [OrderController::class, 'store'])->name('order.store');
    Route::get('cart/{cart}/show', [CartController::class, 'show'])->name('cart.show');
    Route::delete(('cart/{cart}/delete'), [CartController::class, 'destroy'])->name('cart.destroy');
    Route::delete(('cartline/{cartline}/delete'), [CartLineController::class, 'destroy'])->name('cartline.destroy');
    Route::get('cart/list', [CartController::class, 'index'])->name('cart.index');
    Route::get('cart/{order}/edit', [OrderController::class, 'edit'])->name('order.edit');

    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/save', [UserController::class, 'store'])->name('user.store');
    Route::get('user/list', [UserController::class, 'index'])->name('user.index');
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('user/{user}/show', [UserController::class, 'show'])->name('user.show');
    Route::delete(('user/{user}/delete'), [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware('usuarioiniciado')->group(function() {
    //Rutas de carrito y pedido
    Route::get('cart/select', [CartController::class, 'select'])->name('cart.select');
    Route::get('/cartline/check', [CheckCartController::class, 'index'])->name('check.index');
    Route::get('/cartuser/{stock}/{mayor0}/{itemid}', function ($stock = null, $mayor0 = null) {
        if($stock == null){
            $stock = true;
        }if($mayor0 == null){
            $mayor0 = true;
        }else{
            return view('livewire.cart-index');
        }
    }, [CartController::class, 'indexUser'])->name('cartuser.index');
    
    Route::get('/cartuser',[CartController::class, 'indexUser'])->name('cartuser.index');
    Route::put('/cartuser/{id}/update', [CartLineController::class, 'update'])->name('cartline.update');
    Route::get('order/list/user', [OrderController::class, 'indexuser'])->name('orderuser.index');
    Route::put('cartline/{cartline}/update', [CartLineController::class, 'update'])->name('cartline.update');
    Route::delete('/cartline/{cartline}/delete', [CartLineController::class, 'destroyuser'])->name('cartline.destroyuser');

    //orders para usuarios
    Route::get('order/lista', [OrderController::class, 'lista'])->name('order.lista-user');
    Route::get('order/lista/{order}/show', [OrderController::class, 'showUser'])->name('order.show-user');

    Route::post('order/create/singleline', [OrderController::class, 'orderProduct'])->name('order.product');
    Route::post('cart/{product}/cartline', [CartController::class, 'cartProduct'])->name('cart.product');

});

// Rutas creadas para la página principal
Route::get('products/{product}/show', [ProductController::class, 'productUserShow'])->name('product.UserShow');
Route::get('products/list', [ProductController::class, 'productList'])->name('product.list');
Route::get('componentes/lista', [TypeController::class, 'lista'])->name('type.lista');
Route::get('products/{type}/lista', [TypeController::class, 'listaProductsType'])->name('type.listaProductsType');
Route::get('product/{product}/show', [ProductController::class, 'productUserShow'])->name('product.UserShow');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
