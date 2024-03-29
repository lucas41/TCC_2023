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
    <!-- Criando Container-->
    <section class="global forms">
        <div class="form login">
            <div class="form-content">
                <center>
                    <h2> Insira uma nova senha </h2>
                </center>
                <form method="POST">
                    @csrf
                    <div class="field input-field">
                        <!-- Seu código HTML -->
                        <input type="hidden" name="email" value="{{ $email }}" />
                        <input type="password" name="senha" class="input" placeholder="Senha">
                    </div>

                    <div class="field input-field">
                        <input type="password" name="senha" class="input" placeholder="Senha">
                    </div>

                    <div class="field button-field">
                        <button>Alterar senha</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>

</html>
