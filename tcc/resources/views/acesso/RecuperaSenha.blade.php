<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci minha senha</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- box -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- Verifica se possui mensagem em sessão -->
    @include('partials.verificalog')
    <!-- termino da verificação se existe mensagem na sessão -->

    <!-- Criando Container-->
    <section class="global forms">
        <div class="form login">
            <div class="form-content">
                <header>Esqueci minha senha</header>
                <!-- Form -->
                <form method="POST">
                    @csrf
                    <div class="field input-field">
                        <input type="email" name="email" class="input" placeholder="Email">
                    </div>

                    <div class="field button-field">
                        <button>Recuperar conta</button>
                    </div>

                    <div class="form-link">
                        <span>Já tem uma conta?</span> <a href="{{ route('login') }}" class="singup-link">Entre
                            aqui!</a>
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>

</html>
