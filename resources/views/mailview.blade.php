<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Token</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
            /* background-color: rgb(0, 0, 0, 0.1); */
        }

        body,
        html {
            height: 100%;
            background-color: #111827;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            gap: 20px;
            padding: 30px
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            gap: 20px;
            padding: 30px
        }

        .form {

            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            gap: 30px;
            padding: 80px 20px;
            background-color: #1F2937;
            border-radius: 20px
        }

        .inputs {
            display: flex;
            justify-content: center;
            gap: 10px;

        }

        .inputs input {
            height: 80px;
            width: 80px;
            border: none;
            background-color: #111827;
            border-radius: 10px;
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 200%

        }

        input:focus {
            /* -webkit-transition: 0.5s; */
            /* transition: 0.5s; */
            outline: none;
            /* border: 3px solid #555; */
        }

        .button {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-content: center;
        }

        .button input {
            width: 45%;
            padding: 15px 20px;
            border: none;
            color: white;
            font-weight: bold;
            letter-spacing: 2px;
            border-radius: 20px;
            background-color: #111827;
            font-size: 125%;
        }

        button input:hover {
            background-color: rgb(17, 24, 39, 0.5);
        }

        .text {
            border-radius: 20px;
            background-color: #1F2937;
            padding: 10px 40px;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>

    <form action="{{ route('validar.token') }}" method="post">
        <div class="text">
            <h1>Ingresa el codigo que se envio a tu dispositivo movil usando el que se te envio a tu correo electronico</h1>
        </div>
        @csrf
        <div class="form">
            <div class="inputs">
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <input type="number" name="uno" id="uno" class="input-token" maxlength="1">
                <input type="number" name="dos" id="dos" class="input-token" maxlength="1">
                <input type="number" name="tres" id="tres" class="input-token" maxlength="1">
                <input type="number" name="cuatro" id="cuatro" class="input-token" maxlength="1">
                <input type="number" name="cinco" id="cinco" class="input-token" maxlength="1">
                <input type="number" name="seis" id="seis" class="input-token" maxlength="1">
            </div>
            <div class="button">
                <input type="submit" value="Enviar">
            </div>
        </div>
    </form>
</body>
<script>
    var inputsToken = document.getElementsByClassName('input-token');
</script>

</html>
