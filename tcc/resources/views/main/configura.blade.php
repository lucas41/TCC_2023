<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

</head>

<body>

    @include('partials.navbar')
    <!-- Formulario aqui-->
    <div class="alinhaCards">
      @include('partials.cardsperfil')
        <div>
            <div class="cardFoto">
                <img src="{{ asset('img/users/' . $user->foto) }}" alt="Foto Perfil">
                <div>
                    <h2>Trocar foto de usuario</h2>
                </div>
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="foto" name="foto" accept="image/png, image/jpeg" />
            </div>
            <div class="formularioPerfil">
                <div>
                    <div class="inputForms">
                        <div class="inputGroup">
                            <input type="text" required="" name="nome" autocomplete="off" value="{{ $user->nome }}">
                            <label for="name">Nome Completo</label>
                        </div>
                        <div class="inputGroup">
                            <input type="text" required="" name="sobrenome" autocomplete="off" value="{{ $user->sobrenome }}">
                            <label for="name">Sobre nome</label>
                        </div>
                    </div>

                    <div class="inputGroup">
                        <input type="email" required="" name="email" autocomplete="off" value="{{ $user->email }}">
                        <label for="name">e-mail</label>
                    </div>
                    <br>
                    <div class="inputGroup">
                        <input type="email"  autocomplete="off">
                        <label for="name">Endereço</label>
                    </div>
                    <div class="inputForms">
                        <div class="inputGroup">
                            <input type="text"  autocomplete="off">
                            <label for="name">Cidade</label>
                        </div>
                        <div class="inputGroup">
                            <input type="email"  autocomplete="off">
                            <label for="name">Estado</label>
                        </div>
                    </div>
                    <div class="inputForms">
                        <div class="inputGroup">
                            <input type="text"  autocomplete="off">
                            <label for="name">CEP</label>
                        </div>
                        <div class="inputGroup">
                            <input type="email" autocomplete="off">
                            <label for="name">Pais</label>
                        </div>
                    </div>
                    <div class="botao-forms">
                        <button>Atualizar Informações</button>
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
