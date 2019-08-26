<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de verificación</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="row">
        <div class="col s6">
            <h1 class="center-align  cyan-text text-darken-4">Verifica tu cuenta</h1>
        </div>
        <div class="col s6">
            <p class="center-align">
                Para poder acceder a tu nube, por favor verifica tu cuenta dando click al botón de abajo, si tu no solicitaste
                una cuenta para "mi nubecita", haz caso omiso a este mensaje
            </p>
        </div>
        <div class="col s6">
            <a href="{{ route('verificacion', ['token' => $token]) }}" class="waves-effect waves-light btn-large">
                Verificar cuenta
                <i class="material-icons right">verified_user</i>
            </a>
        </div>
        <div class="col s6">
            <h5 class="center-align blue-text text-darken-1">¡Disfruta almacenando c:!</h5>
        </div>
    </div>
</body>
</html>
