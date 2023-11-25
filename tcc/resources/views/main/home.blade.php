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
    <div class="container">
        @include('partials.navbar')
        <!-- Card box -->
        <div class="cardBox">
            <div class="cardPositive">
                <div>
                    @if (session('id_conta_selecionada') == null)
                        <div class="numbers">R$ 0</div>
                        <div class="cardName">Sem conta selecionada</div>
                    @else
                        <div class="numbers">R$ {{ $conta->entrada }}</div>
                        <div class="cardName">Entradas na conta {{ $conta->Nome_Conta }}</div>
                    @endif
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
                    @if (session('id_conta_selecionada') == null)
                        <div class="numbers"> R$ 0</div>
                        <div class="cardName">Sem conta selecionada</div>
                    @else
                        <div class="numbers">R$ {{ $conta->saida }}</div>
                        <div class="cardName">Saidas na conta {{ $conta->Nome_Conta }}</div>
                    @endif
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
        @include('partials.verificalog')
        <!-- Informações aqui-->
        <div class="details">
            <div class="moviementacoesRecentes">
                <div class="cardHeader">
                    <h2>Movimentações Recentes</h2>
                    <a href="{{ route('CadastroLancamento') }}" class="btn">Ver tudo</a>
                </div>
                @if (session('id_conta_selecionada') == null)
                    <br>
                    <h2> Não há lançamentos cadastrados </h2>
                @else
                    <table>
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Valor</td>
                                <td>Data</td>
                                <td> Centro </td>
                                <td>Entrada/Saída</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lancamentos->sortByDesc('created_at')->take(5) as $lancamento)
                                <tr>
                                    <td>{{ $lancamento->Nome }}</td>
                                    <td>R$ {{ $lancamento->valor }}</td>
                                    <td>{{ date('d/m/Y', strtotime($lancamento->created_at)) }}</td>
                                    @if ($lancamento->centro_custo_id == null)
                                        <td> Entrada </td>
                                    @else
                                        <td>
                                            {{ $lancamento->centroCusto->Nome }}
                                        </td>
                                    @endif
                                    <td>
                                        @if ($lancamento->Tipo == 1)
                                            <span class="statusEntrada">Entrada</span>
                                            <span class="icon-entrada"> + </<span>
                                        @else
                                            <span class="statusSaida">Saída</span>
                                            <span class="icon-saida"> - </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
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
