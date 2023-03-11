<!DOCTYPE html>
<html>

<head>
    <title>Bienvenido a nuestra aplicación</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 style="width: 100%">Hola {{ $name }}, Ingresa a la siguiente liga para obtener tu codigo el cual ingresaras a tu app
            movil.</h2>
        <p style="width: 100%"> {{ $url }}</p>
    </div>
</body>

</html>
