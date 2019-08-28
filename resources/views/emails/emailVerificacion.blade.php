<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de verificación</title>
    <style>
        .container{
            display: flex;
            flex-direction: column;
            max-width: 100px;
        }
        .cabecera{
            display: flex;
            flex: 4;
            background-color: #045FB4;
            justify-content: center;
            align-items: center;
            -webkit-box-shadow: -5px 7px 8px -5px rgba(0,0,0,0.52);
            -moz-box-shadow: -5px 7px 8px -5px rgba(0,0,0,0.52);
            box-shadow: -5px 7px 8px -5px rgba(0,0,0,0.52);
        }
        .cuerpo{
            display: flex;
            flex: 2;
            justify-content: center;
            align-items: center;
        }
        .link{
            display: flex;
            flex: 2;
            justify-content: center;
            align-items: center;
        }
        .footer{
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
        }
        .cabecera-text{
            color: #ECF6CE;
        }
        .cuerpo-text{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 17px;
            color: #210B61;
        }
        .boton{
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            background-color: #4db6ac;
            color: white;
            font-weight: bold;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            padding-top: 1rem;
            padding-bottom: 1rem;
            padding-left: 4rem;
            padding-right: 4rem;
            -webkit-box-shadow: -2px 6px 8px -4px rgba(0,0,0,0.52);
            -moz-box-shadow: -2px 6px 8px -4px rgba(0,0,0,0.52);
            box-shadow: -2px 6px 8px -4px rgba(0,0,0,0.52);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cabecera">
            <h1 class="cabecera-text">Verifica tu cuenta</h1>
        </div>
        <div class="cuerpo">
            <p class="cuerpo-text">
                Para poder acceder a tu nube, por favor verifica tu cuenta dando click al botón de abajo, si tu no solicitaste
                una cuenta para "mi nubecita", haz caso omiso a este mensaje
            </p>
        </div>
        <div class="link">
            <a href="" class="boton">
                Verificar cuenta
            </a>
        </div>
        <div class="footer">
            <h5 class="center-align blue-text text-darken-1">¡Disfruta almacenando c:!</h5>
        </div>
    </div>
</body>
</html>
