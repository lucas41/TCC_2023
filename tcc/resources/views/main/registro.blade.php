<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- box -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <!-- Criando Container-->
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Cadastro</header>
                
                <!-- Form -->
                <form action="#">
                    <div class="field input-field">
                        <input type="text" class="input" placeholder="Nome">
                    </div>

                    <div class="field input-field">
                        <input type="text" class="input" placeholder="Sobrenome">
                    </div>

                    <div class="field input-field">
                        <input type="email" class="input" placeholder="Email">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password">
                        <i class="bx bx-hide eye-icon"></i>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password">
                        <i class="bx bx-hide eye-icon"></i>
                    </div>

                    <div class="field button-field">
                        <button>Realizar Cadastro</button>
                    </div>

                    <div class="form-link">
                        <span>Já tem uma conta?</span> <a href="{{ route('login') }}" class="singup-link">Entre aqui!</a>
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>
</html>