<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Livewire -->
        @livewireStyles

    </head>
    <body style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
        <div class="wrapper">
            <div class="card">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarToggler">
                        <a href="/" class="btn btn-succes btn-sm" title="MENU_SUPERUSUARIO">
                            <h1 style="padding-right: 20px; padding-left: 20px;" class="text-light">AllComponents</h1>
                        </a>                        
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                               <h4><a class="nav-link" href=" {{ route('type.lista') }} ">Categorías<span class="sr-only">(current)</span></a></h4>
                            </li>
                            <li class="nav-item active">
                                <h4><a class="nav-link" href=" {{ route('product.list') }}">Productos<span class="sr-only">(current)</span></a></h4>
                            </li>
                            @if(Auth::user() != null && Auth::user()->admin == TRUE)

                                <li class="nav-item active">
                                    <h4><a class="nav-link" href=" {{ route('admin.main') }}">Administrador<span class="sr-only">(current)</span></a></h4>
                                </li>
                            @endif
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item" style="padding-right: 20px;">
                                        <h4><a href="{{ route('login') }}" class=" btn-succes text-light" style="text-decoration: none;" title="LOGIN"><b>{{ __('Login') }}</b></a></h4>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item" style="padding-right: 20px;">
                                        <h4><a href="{{ route('register') }}" class=" btn-succes text-light" style="text-decoration: none;" title="LOGIN"><b>{{ __('Register') }}</b></a></h4>
                                    </li>
                                @endif
                            @else

                                <li class="nav-item dropdown d-flex" style="padding-right: 25px; width: 200px;">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <h4>{{ Auth::user()->name }}</h4>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('myprofile') }}"> Perfil</a>
                                        <a class="dropdown-item" href="{{ route('cart.select') }}"> Carrito</a>
                                        <a class="dropdown-item" href="{{ route('order.lista-user') }}"> Pedidos</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="bg-dark text-white text-center">
            <label class="font-weight-bold h2 text-center mx-auto">MENU SUPERUSUARIO</label><br/>
            <div class="card-body">
                <div align="center">
                    <a href=" {{ route('type.index') }}" class="btn btn-succes" title="TYPES"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>TIPOS</button></a>
                    <a href=" {{ route('product.index') }}" class="btn btn-succes" title="PRODUCTS"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>PRODUCTOS</button></a>
                    <a href=" {{ route('supplier.index') }}" class="btn btn-succes" title="SUPPLIERS"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>PROVEEDORES</button></a>
                    <a href=" {{ route('cart.index') }}" class="btn btn-succes" title="CARTS"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>CARRITO</button></a>
                    <a href=" {{ route('order.index') }}" class="btn btn-succes" title="ORDERS"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>PEDIDO</button></a>
                    <a href=" {{ route('user.index') }}" class="btn btn-succes" title="USERS"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>USUARIOS</button></a>
                </div>
            </div>
        </div>
        @yield('content')
        @livewireScripts
    </body>
</html>
