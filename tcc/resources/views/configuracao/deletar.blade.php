<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sair</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/deletar.css') }}">

</head>

<body>
    @include('partials.navbar')
    @include('partials.verificalog')
    <!-- Formulario aqui-->
    <div class="alinhaCards">
        @include('partials.cardsperfil')
        <div>
            <div class="formularioPerfil">
                <div>
                    <div class="texto-deleta">
                        <h2>Deletar Conta</h2>
                        <p>
                            Que pena ver você indo embora! Sabemos que o mundo dos orçamentos pode ser sério e às vezes
                            até um pouco chato, mas acredite, sua presença aqui sempre trouxe um toque especial de
                            leveza e bom humor. Esperamos que sua jornada em busca de controle financeiro seja um
                            sucesso, e que você alcance todos os seus objetivos!
                        </p>
                        <p>
                            Caso mude de ideia ou precise de uma pausa, saiba que sempre será bem-vindo(a) de volta.
                            Enquanto isso, vamos cuidar para que a plataforma continue eficiente e funcional, assim,
                            quando você retornar, estaremos prontos para ajudá-lo(a) novamente.
                        </p>
                        <p>
                            Para prosseguir com a exclusão da conta entre com sua senha e com o codigo 2FA enviado no
                            seu e-mail cadastrado, após isso seus dados serão <b>permanentemente excluidos da
                                plataforma</b>.
                        </p>
                    </div>
                    <form method="post" action="{{ route('enviar.email') }}">
                        @csrf
                        <div class="botao-2fa">
                            <button>Solicitar 2FA</button>
                        </div>
                    </form>
                    <form method="post">
                        @csrf
                        @method('DELETE')
                        <div class="inputForms">
                            <div class="inputGroup">
                                <input type="password" name="senhaatual" required="" autocomplete="off">
                                <label for="name">Senha Atual</label>
                            </div>
                            <div class="inputGroup">
                                <input type="number" name="codigo2fa" required="" autocomplete="off">
                                <label for="name">Codigo 2FA</label>
                            </div>
                        </div>
                        <div class="botao-forms">
                            <button>Deletar Conta</button>
                        </div>
                    </form>
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
