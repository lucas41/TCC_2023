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
    <!-- box -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>

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

    <div class="container">
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
                    <img src="senhores.jpg" alt="">
                </div>
            </div>

            <!-- Card box -->
            <div class="cardBox">
                <div class="cardPositive">
                    <div>
                        <div class="numbers">R$ 1500</div>
                        <div class="cardName">Entrada</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                    </div>
                </div>
                <div class="cardBalance">
                    <div>
                        <div class="numbers">R$ 1500</div>
                        <div class="cardName">Saldo Atual</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
                <div class="cardNegative">
                    <div class=>
                        <div class="numbers">- R$1500</div>
                        <div class="cardName">Saida</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="arrow-down-circle-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- Graficos -->
            <div class="graphBox">
                <div class="box">
                    <canvas id="mensal"></canvas>
                </div>
                <div class="box">
                    <canvas id="anual"></canvas>
                </div>
            </div>

            <!-- Informações aqui-->
            <div class="details">
                <div class="moviementacoesRecentes">
                    <div class="cardHeader">
                        <h2>Movimentações Recentes</h2>
                        <a href="#" class="btn">Ver tudo</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Valor</td>
                                <td>Data</td>
                                <td>Entrada/Saída</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>teste</td>
                                <td>teste</td>
                                <td>teste</td>
                                <td><span class="statusEntrada">teste</span></td>
                            </tr>
                            <tr>
                                <td>teste</td>
                                <td>teste</td>
                                <td>teste</td>
                                <td><span class="statusSaida">teste</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/filesCharts.js') }}"></script>

<script>

    // Efeito do menu
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');

    toggle.onclick = function(){
        navigation.classList.toggle('active');
        main.classList.toggle('active');
    }

    // Aplica e remove a classe hoverd
    let list = document.querySelectorAll('.navigation li');
    function activeLink(){
        list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
    }

    list.forEach((item) =>
    item.addEventListener('mouseover',activeLink));

</script>
</body>

    <!--
    <a href={{ route('selecionaconta') }}> Selecionar conta </a>
    <br>
    <a href={{ route('CentroCusto') }}> Cadastrar Centro de custo </a>
    <br>
    <a href={{ route('CadastroLancamento') }}> Cadastrar Lançamento </a>
    <br>
    <a href="/logout">Sair</a>
    -->
    
</html>
