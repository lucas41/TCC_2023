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
    <script>
         var centrocusto = <?php echo json_encode($centrocusto); ?>;
    </script>
</head>

<body>

    @include('partials.verificalog')

    <div class="container">

        @include('partials.navbar')

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
                    @if (session('id_conta_selecionada') == null)
                        <div class="numbers">R$ 0</div>
                        <div class="cardName">Sem conta selecionada</div>
                    @else
                        <div class="numbers">R$ {{ $conta->saldo }}</div>
                        <div class="cardName">Saldo Atual na conta {{ $conta->Nome_Conta }}</div>
                    @endif
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
    <script src="{{ asset('js/filesCharts.js') }}"></script>
</body>


</html>
