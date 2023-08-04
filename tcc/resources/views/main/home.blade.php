<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Botstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- box -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>


    @if (session('success'))
        <div id="mensagem" class="flash-message">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                $('#mensagem').fadeOut('slow');
            }, 3500);
        </script>
    @endif

    @if (session('danger'))
        <div id="mensagem-erro" class="flash-message-erro">
            {{ session('danger') }}
        </div>
        <script>
            setTimeout(function() {
                $('#mensagem-erro').fadeOut('slow');
            }, 3500);
        </script>
    @endif

    <?php
    $nome = session('nome');
    $id = session('id');
    $conta = session('id_conta_selecionada');
    echo "seja bem vindo  $nome";
    echo '<br>';
    echo "A conta selecionada e a conta de id $conta";
    ?>



    <br>
    <a href={{ route('Cadastraconta') }}> Cadastrar conta </a>
    <br>
    <a href={{ route('selecionaconta') }}> Selecionar conta </a>
    <br>
    <a href={{ route('CentroCusto') }}> Cadastrar Centro de custo </a>
    <br>
    <a href="/logout">Sair</a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
