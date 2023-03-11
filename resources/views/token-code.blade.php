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
            background-color: rgb(0, 0, 0, 0.1);
        }

        body,
        html {
            height: 100%;
            background-color: #111827;
            display: flex;
            justify-content: center;
            align-content: center;
            flex-direction: column;
            gap: 20px;
            padding: 30px;
            color: white;
        }

        .container {
            display: flex;
            justify-content: center;
            align-content: center;
            gap: 10px;
            background-color: #1F2937;
            border-radius: 40px;
        }

        .container p {
            width: 80px;
            height: 80px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-weight: bold;
            font-size: 150%;
            background-color: #111827;
            border-radius: 20px
        }

        .container:nth-child(1){
            padding: 25px;
        }

    </style>
</head>

<body>
    <div class="container">
        <h2>Ingresa este codigo en tu app movil</h2>
    </div>
    <div class="container">
        @for ($i = 0; $i < count($data); $i++)
            <p class="numerber">{{ $data[$i] }}</p>
        @endfor
    </div>
</body>

<script>



</script>

</html>
