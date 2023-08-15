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
            <a href="#">
                <span class="icon"><ion-icon name="calculator-outline"></ion-icon></span>
                <span class="title">Centro de Custo</span>
            </a>
        </li>
        <li>
            <a href="{{ route('selecionaconta') }}">
                <span class="icon"><ion-icon name="calculator-outline"></ion-icon></span>
                <span class="title">Conta Bancaria</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="trending-up-outline"></ion-icon></span>
                <span class="title">Investimentos</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                <span class="title">Configurações</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="contrast-outline"></ion-icon></span>
                <span class="title">Dark Mode</span>
            </a>
        </li>
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
     
            <img src="{{ asset('img/users/' . $user->foto) }}" alt="">
        </div>
    </div>
