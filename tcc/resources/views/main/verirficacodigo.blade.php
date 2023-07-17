<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci minha senha</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style_recupera.css') }}">


    <!-- box -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <!-- Verifica se possui mensagem em sessão -->
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
    <!-- termino da verificação se existe mensagem na sessão -->

    <div class="container">
        <div class="icone">
            <img src="{{ asset('img/cadeado.png') }}">
        </div>
        <center><h4 >Validação de dois fatores</h4></center>
        <form method="post">
            @csrf
            <div class="inputValues">
                <input name="email" type="hidden" value="{{$email}}">
                <input name="codigo"  type="text">
                <input name="codigo1" type="text" disabled>
                <input name="codigo2" type="text" disabled>
                <input name="codigo3" type="text" disabled>
                <input name="codigo4" type="text" disabled>
                <input name="codigo5" type="text" disabled>
            </div>
            <button>
                Validar codigo
            </button>
        </form>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
