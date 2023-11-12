<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/contaBancaria.css') }}">
</head>

<body>
    <div class="container">

        @include('partials.navbar')
        @include('partials.verificalog')
        <div class="page-title">
            <h3>Centros de custo</h3>
        </div>
        <div class="alinhaCards">
            <button id="open-modal" style="all: unset;">
                <div class="cardOpcoesUsuario">
                    <div class="AdicionarConta">
                        <div class="card-title">
                            <h2>Adicionar Centro</h2>
                            <ion-icon name="add-outline"></ion-icon>
                        </div>
                        <p>Adicione as informações</p>
                    </div>
                </div>
            </button>
        </div> 

        <div id="fade" class="hide"></div>
        <div id="modal" class="hide">
            <div class="modal-header">
                <h2>Adicionar Centro de custo</h2>
                <button id="close-modal" class="btn-modal-fechar">Fechar</button>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <form method="POST">
                        @csrf
                        <div class="inputForms">
                            <div class="inputGroup">
                                <input type="text" name="nome" required="" autocomplete="off">
                                <label for="name">Nome</label>
                            </div>
                        </div>
                        <div class="inputForms">
                            <div class="inputGroup">
                                <input type="number" name="valplanejado" required="" autocomplete="off">
                                <label for="name">Valor Planejado</label>
                            </div>
                        </div>
                        <div class="botao-forms">
                            <button>Criar Centro de Custo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="listar-contas">
            @foreach ($centrocusto as $centro)
                <div class="card-Conta-User">
                    <div class="header-card-conta">
                        <h2>{{ $centro->Nome }}</h2>
                        <div class="dropdown">
                            <div class="dots" onclick="toggleDropdown(this)">&#8942;</div>
                            <div class="dropdown-content">
                                <a ata-toggle="modal" data-target="#exampleModal" href="#">Editar Informações</a>
                                <a href="{{ route('apagarcentroid', ['id' => $centro->id]) }}">Apagar Conta</a>
                            </div>
                        </div>
                    </div>
                    <div class="body-card-conta">
                        <p>Valor planjeado R$ {{ $centro->valplanejado}}</p>
                        <p>Valor Utilizado R$ {{ $centro->valatual}}</p>
                        <p>valor atual R$ {{ $centro->valplanejado - $centro->valatual}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="{{ asset('js/CentroCusto.js') }}"></script>
    </div>
    
</body>

</html>
