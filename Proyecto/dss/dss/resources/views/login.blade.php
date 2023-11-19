<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content = "width=device-width, initial-scale=1">

<title>Inicio de Sesion</title>
</head>

<body>
    <main class="container align-center p-5">
        <form method="POST" action="{{route('inicia-sesion')}}">
            @csrf

            <div class="mb-3">
                <label for="userInput" class="form-label">Nombre de usuario</label>
                <input type="user" class="form-control" id = "userInput" name="user" required autocomplete="disable">
            </div>

            <div class="mb-3">
                <label for="passwordInput" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id = "passwordInput" name="password" required>
            </div>
            <!--
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id = "rememberCheck" name="remember">
                <label class="form-check-label" for="rememberCheck">Mantener sesion iniciada</label>
            </div>
            Mantener sesion iniciada opcion
            //-->

            <button type="submit" class="btn btm-primary">Iniciar Sesion</button>
        </form>
    </main>
</body>
</html>