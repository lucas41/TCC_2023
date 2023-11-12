<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segurança</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/senha.css') }}">
</head>

<body>

    <div class="container">
        @include('partials.navbar')
        @include('partials.verificalog')
        <!-- Formulario aqui-->
        <div class="alinhaCards">
            @include('partials.cardsperfil')
            <div>
                <div class="cardSenha">
                    <div>
                        <h2>Trocar senha</h2>
                        <p>Para realizar a troca da senha é necessario entrar com a senha atual e então insirir a nova
                            senha e sua confirmação.</p>
                    </div>
                    <div class="form-senha">
                        <div>
                            <form action="" method="post">
                                @csrf
                                <div class="inputForms">
                                    <div class="inputGroup">
                                        <input type="password" name="senhaatual" required="" autocomplete="off">
                                        <label for="name">Senha atual</label>
                                    </div>
                                </div>
                                <div class="inputForms">
                                    <div class="inputGroup">
                                        <input type="password" name="novasenha" required="" autocomplete="off">
                                        <label for="name">Nova senha</label>
                                    </div>
                                </div>
                                <div class="inputForms">
                                    <div class="inputGroup">
                                        <input type="password" required="" autocomplete="off">
                                        <label for="name">Confirmar nova senha</label>
                                    </div>
                                </div>
                                <div class="botao-senha">
                                    <button>Atualizar Senha</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        // Efeito do menu
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function() {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        // Aplica e remove a classe hoverd
        let list = document.querySelectorAll('.navigation li');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('hovered'));
            this.classList.add('hovered');
        }

        list.forEach((item) =>
            item.addEventListener('mouseover', activeLink));
    </script>
</body>

</html>
