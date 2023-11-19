@extends('theme.main')

@section('title', 'ACCESO')

@section('content')
<div class="container" style="padding-top: 25px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center h4">{{ __('Iniciar Sesión') }}</div>

                <div class="card-body d-flex justify-content-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email input -->
                        <div class="form-floating mb-3"  style="width: 550px;">
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="name@example.com" autocomplete="email" required autofocus />
                            <label class="" for="email">{{ __('Correo Electrónico') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <!-- Password input -->
                        <div class="form-floating mb-3"  style="width: 550px;">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password" />
                            <label class="" for="password">{{ __('Contraseña') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check" style="padding-top: 9px;">
                                <input class="form-check-input" type="checkbox" value=""  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember"> {{ __('Recordarme') }} </label>
                            </div>
                            </div>

                            <div class="col">
                            <!-- Simple link -->
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Recuperar contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="w-100 text-center">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary w-50">{{ __('Iniciar Sesión') }}</button>
                        </div>
                        </br>
                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>¿No estás registrado? <a href="{{ route('register') }}">Registrarse</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
