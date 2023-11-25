<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/lacamento.css') }}">
</head>

<body>

    <div class="container">
        @include('partials.navbar')

        <div class="details">
            <div class="moviementacoesRecentes">
                <div class="cardHeader">
                    <h2>Relatórios</h2>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Mês</td>
                            <td>Ano</td>
                            <td>Conta Bancaria</td>
                            <td>Saldo FInal</td>
                            <td>Saldo Entrada</td>
                            <td>Saldo Saida</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relatorios as $relatorio)
                            <tr>
                                <td> {{$relatorio->mes}} </td>
                                <td>{{$relatorio->ano}}</td>
                                @php
                                $conta_bancaria = App\Models\ContaBancaria::find($relatorio->conta_id);
                                @endphp
                                <td>@php echo $conta_bancaria->Nome_Conta ?? 'Conta não encontrada'; @endphp</td>
                                @php
                                @endphp
                                <td>{{$relatorio->saldo}}</td>
                                <td>{{$relatorio->entrada}}</td>
                                <td>{{$relatorio->saida}}</td>   
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
        <script src="https://kit.fontawesome.com/425c447bde.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/filesCharts.js') }}"></script>
    </div>

</body>


</html>
