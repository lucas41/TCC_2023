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

    <section class="global forms">
        <!-- Criando Container-->
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <!-- Form -->
                <form method="POST">
                    @csrf
                    <div class="field input-field">
                        <input type="email" name="email" class="input" placeholder="Email">
                    </div>

                    <div class="field input-field">
                        <input type="password" name="senha" placeholder="Password" class="password">
                        <i class="bx bx-hide eye-icon"></i>
                    </div>

                    <div class="form-link">
                        <a href="{{ route('recuperacao') }}" class="forgot-pass">Esqueceu sua senha?</a>
                    </div>

                    <div class="field button-field">
                        <button>Login</button>
                    </div>

                    <div class="form-link">
                        <span>Não tem uma conta?</span> <a href="{{ route('registro') }}" class="singup-link">Crie
                            aqui!</a>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
