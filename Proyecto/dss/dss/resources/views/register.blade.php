<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content = "width=device-width, initial-scale=1">

<title>Registro</title>
</head>

<body>
    <main class="container align-center p-5">
        <form method="POST" action="{{route('validar-registro')}}">
            @csrf

            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id = "emailInput" name="email" required autocomplete="disable">
            </div>

            <div class="mb-3">
                <label for="userInput" class="form-label">Nombre de usuario</label>
                <input type="user" class="form-control" id = "userInput" name="user" required autocomplete="disable">
            </div>

            <div class="mb-3">
                <label for="passwordInput" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id = "passwordInput" name="password" required>
            </div>

            <button type="submit" class="btn btm-primary">Registrarse</button>
        </form>
    </main>
</body>
</html>