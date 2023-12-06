<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançamentos</title>
    <link rel="stylesheet" href="{{ asset('css/lacamento.css') }}">
</head>

<body>
    <div class="container">
        @include('partials.navbar')
        @include('partials.verificalog')
        <!-- Model -->
        <div class="alinhaCards">
            <button id="open-modal" style="all: unset;">
                <div class="cardOpcoesUsuario">
                    <div class="AdicionarConta">
                        <div class="card-title">
                            <h2 class="texto">Adicionar Movimentação</h2>
                            <ion-icon class="add" name="add-outline"></ion-icon>
                        </div>
                        <p class="texto2">Entre com as entradas e saídas aqui!</p>
                    </div>
                </div>
            </button>
        </div>
        <div id="fade" class="hide"></div>

        <div id="modal" class="hide">
            <div class="modal-header">
                <h2>Nova movimentação</h2>
                <button id="close-modal" class="btn-modal-fechar">Fechar</button>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <form method="POST">
                        @csrf
                        <div class="inputForms">
                            <div class="inputGroup">
                                <input type="text" name="Nome" required="" autocomplete="off">
                                <label for="name">Nome</label>
                            </div>
                        </div>
                        <br>
                        <div class="inputForms">
                            <div class="inputGroup">
                                <input type="text" name="valor" required="" autocomplete="off">
                                <label for="name">Valor</label>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="id_conta_selecionada"
                                value="{{ session('id_conta_selecionada') }}">
                        </div>
                        <div class="inputForms">
                            <div class="inputGroup">
                                <p>Selecione o centro de custo:</p>
                                <select name="centro" class="inputGroup">
                                    @foreach ($centrocusto as $centro)
                                        <option value={{ $centro->id }}>{{ $centro->Nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="inputForms">
                            <div class="inputGroup">
                                <p>Selecione o tipo de movimentação:</p>
                                <select name="Tipo" class="inputGroup">
                                    <option value="0">Entrada/Saída</option>
                                    <option value="1">Entrada</option>
                                    <option value="2">Saída</option>
                                </select>
                            </div>
                        </div>
                        <div class="botao-forms">
                            <button>Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Informações aqui-->
        <div class="details">
            <div class="moviementacoesRecentes">
                <div class="cardHeader">
                    <h2>Movimentações</h2>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Valor</td>
                            <td>Centro</td>
                            <td class="date">Data</td>
                            <td>Entrada/Saída</td>
                            <td>Opções</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lancamentos as $lancamento)
                            <tr>
                                <td>{{ $lancamento->Nome }}</td>
                                <td>R$ {{ $lancamento->valor }}</td>
                                @if ($lancamento->centro_custo_id == null && $lancamento->Tipo == 1)
                                    <td> Entrada </td>
                                @elseif($lancamento->centro_custo_id == null && $lancamento->Tipo == 3)
                                    <td> Excluido </td>
                                @else
                                    <td> {{ $lancamento->centroCusto->Nome }} </td>
                                @endif
                                <td class="date">{{ date('d/m/Y', strtotime($lancamento->created_at)) }}</td>
                                <td>
                                    @if ($lancamento->Tipo == 1)
                                        <span class="statusEntrada">Entrada</span>
                                        <span class="icon-entrada"> + </<span>
                                        @else
                                            <span class="statusSaida">Saída</span>
                                            <span class="icon-saida"> - </span>
                                    @endif
                                </td>
                                <td><a href="{{ route('apagalancamentoid', ['id' => $lancamento->id]) }}"><i
                                            class="fa-regular fa-trash-can fa-lg"></i></a>&nbsp;
                                    <a href="#" id="openModalLink"
                                        data-target-modal="myModal_{{ $lancamento->id }}"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $lancamentos->links('pagination.custom') }}
    </div>
    </div>

        @foreach ($lancamentos as $lancamento)
            <div id="myModal_{{ $lancamento->id }}" class="modal">
                <div class="modal-header">
                    <h2>Editar Conta</h2>
                    <button id="closeModalBtn" class="btn-modal-fechar">Fechar</button>
                </div>
                <div class="modal-body">
                    <div class="modal-form">
                        <form method="POST" action="{{ route('lancamento.update', $lancamento->id) }}" >
                            @csrf
                            <div class="inputForms">
                                <div class="inputGroup">
                                    <input type="text" name="Nome" required="" autocomplete="off" value="{{ $lancamento->Nome }}">
                                    <label for="name">Nome</label>
                                </div>
                            </div>
                            <div class="inputForms">
                                <div class="inputGroup">
                                    <input type="text" name="Valor" required="" autocomplete="off" value="{{ $lancamento->valor }}">
                                    <label for="name">Valor</label>
                                </div>
                            </div>
                            <div class="inputForms">
                                <div class="inputGroup">
                                    <p>Selecione o centro de custo:</p>
                                    <select name="centro" class="inputGroup">
                                        @foreach ($centrocusto as $centro)
                                            <option value={{ $centro->id }}>{{ $centro->Nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="botao-forms">
                                <button>Editar Lançamento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div id="overlay"></div>

    <script src="https://kit.fontawesome.com/425c447bde.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="filesCharts.js"></script>

    <script src="{{ asset('js/lancamento.js') }}"></script>

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Função para abrir o modal
        function openModal() {
            var targetModalId = this.dataset.targetModal;
            var targetModal = document.getElementById(targetModalId);
            targetModal.style.display = "block";
            overlay.style.display = "block";
        }

        // Função para fechar o modal
        function closeModal() {
            var targetModalId = this.dataset.targetModal;
            var targetModal = document.getElementById(targetModalId); // Correção aqui
            targetModal.style.display = "none";
            overlay.style.display = "none";
        }

        var openModalLinks = document.querySelectorAll("#openModalLink");
        var closeModalBtns = document.querySelectorAll("#closeModalBtn");

        openModalLinks.forEach(function(link) {
            link.addEventListener("click", openModal);
        });

        closeModalBtns.forEach(function(btn) {
            btn.addEventListener("click", closeModal);
        });
        var overlay = document.getElementById("overlay");

        overlay.addEventListener("click", function() {
            var openModals = document.querySelectorAll(".modal[style='display: block;']");
            openModals.forEach(function(modal) {
                modal.style.display = "none";
            });
            overlay.style.display = "none";
        });
    });
</script>
</body>

</html>
