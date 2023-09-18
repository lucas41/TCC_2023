<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="wallet-outline"></ion-icon>
                </span>
                <span class="title">Se Controla</span>
            </a>
        </li>
        <li>
            <a href="{{ route('home') }}">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="title">Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('selecionaconta') }}">
                <span class="icon"><ion-icon name="wallet-outline"></ion-icon></span>
                <span class="title">Conta Bancaria</span>
            </a>
        </li>
        <li>
            <a href="{{ route('CentroCusto') }}">
                <span class="icon"><ion-icon name="calculator-outline"></ion-icon></span>
                <span class="title">Centro de Custo</span>
            </a>
        </li>
        <li>
            <a href="{{ route('CadastroLancamento') }}">
                <span class="icon"><ion-icon name="trending-up-outline"></ion-icon></span>
                <span class="title">Lançamentos</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="receipt-outline"></ion-icon></span>
                <span class="title">Relatorios</span>
            </a>
        </li>
        <li>
            <a href="{{route('configurar.get')}}">
                <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                <span class="title">Configurações</span>
            </a>
        </li>
        <!--<li>
            <a href="#">
                <span class="icon"><ion-icon name="contrast-outline"></ion-icon></span>
                <span class="title">Dark Mode</span>
            </a>
        </li>-->
        <li>
            <a href="/logout">
                <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="title">Sair</span>
            </a>
        </li>
    </ul>
</div>

<!-- PRINCIPAL -->
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <!-- CAMPO DE BUSCA-->
        <div class="search">
            <label for="">
                <input type="text" placeholder="Pesquisar">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>
        <!-- CAMPO DO USUARIO -->
        <div class="user">
            <a href="{{ route('configurar.get') }}" ><img src="{{ asset('img/users/'.$user->foto) }}" alt=""></a>
        </div>
    </div>

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
