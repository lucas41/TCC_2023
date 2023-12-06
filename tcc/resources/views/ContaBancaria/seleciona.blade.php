<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Bancaria</title>
    <link rel="stylesheet" href="{{ asset('css/contaBancaria.css') }}">
</head>
<body>
    <div class="container">
        @include('partials.navbar')
        @include('partials.verificalog')
        <div class="page-title">
            <h3>Minhas Contas</h3>
        </div>
        <!-- Formulario aqui-->
        <div class="alinhaCards">
            <button id="open-modal" style="all: unset;">
                <div class="cardOpcoesUsuario">
                    <div class="AdicionarConta">
                        <div class="card-title">
                            <h2>Adicionar Conta</h2>
                            <ion-icon name="add-outline"></ion-icon>
                        </div>
                        <p>Entre com as informações da sua conta</p>
                    </div>
                </div>
            </button>
        </div>
        <div id="fade" class="hide"></div>
        <div id="modal" class="hide">
            <div class="modal-header">
                <h2>Adicionar Conta</h2>
                <button id="close-modal" class="btn-modal-fechar">Fechar</button>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <form method="POST">
                        @csrf
                        <div class="inputForms">
                            <div class="inputGroup">
                                <input type="text" name="Nome_Conta" required="" autocomplete="off">
                                <label for="name">Nome da Conta</label>
                            </div>
                        </div>
                        <div class="inputForms">
                            <div class="inputGroup">
                                <input type="text" name="Nome_banco" required="" autocomplete="off">
                                <label for="name">Banco</label>
                            </div>
                        </div>
                        <div class="inputForms">
                            <div class="inputGroup">
                                <input type="text" name="Agencia" required="" autocomplete="off">
                                <label for="name">Agencia</label>
                            </div>
                        </div>
                        <div class="inputForms">
                            <div class="inputGroup">
                                <input type="text" name="Numero" required="" autocomplete="off">
                                <label for="name">Numero da Conta</label>
                            </div>
                        </div>
                        <div class="inputForms">
                            <div class="inputGroup">
                                <input type="text" name="saldo" required="" autocomplete="off">
                                <label for="name">Saldo Atual</label>
                            </div>
                        </div>
                        <div class="botao-forms">
                            <button>Criar Conta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="listar-contas">
            @foreach ($contasBancarias as $conta)
                <div class="card-Conta-User">
                    <div class="header-card-conta">
                        <h2>{{ $conta->Nome_Conta }}</h2>
                        <div class="dropdown">
                            <div class="dots" onclick="toggleDropdown(this)">&#8942;</div>
                            <div class="dropdown-content">
                                <a href="{{ route('selecionarContaid', ['id' => $conta->id]) }}">Selecionar
                                    Conta</a>
                                <a href="#" id="openModalLink"
                                    data-target-modal="myModal_{{ $conta->id }}">Editar Informações</a>
                                <a href="{{ route('apagarContaid', ['id' => $conta->id]) }}">Apagar
                                    Conta</a>
                            </div>
                        </div>
                    </div>
                    <div class="body-card-conta">
                        <p>Banco: {{ $conta->Nome_banco }}</p>
                        <p>Agencia: {{ $conta->Agencia }}</p>
                        <p>Numero da conta: {{ $conta->Numero }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- O modal -->
        @foreach ($contasBancarias as $conta)
            <div id="myModal_{{ $conta->id }}" class="modal">
                <div class="modal-header">
                    <h2>Editar Conta</h2>
                    <button id="closeModalBtn" class="btn-modal-fechar">Fechar</button>
                </div>
                <div class="modal-body">
                    <div class="modal-form">
                        <form method="POST" action="{{ route('contas.update', $conta->id) }}" >
                            @csrf
                            <div class="inputForms">
                                <div class="inputGroup">
                                    <input type="text" name="Nome_Conta" required="" autocomplete="off" value="{{ $conta->Nome_Conta }}">
                                    <label for="name">Nome da Conta</label>
                                </div>
                            </div>
                            <div class="inputForms">
                                <div class="inputGroup">
                                    <input type="text" name="Nome_banco" required="" autocomplete="off" value="{{ $conta->Nome_banco }}">
                                    <label for="name">Banco</label>
                                </div>
                            </div>
                            <div class="inputForms">
                                <div class="inputGroup">
                                    <input type="text" name="Agencia" required="" autocomplete="off" value="{{ $conta->Agencia }}">
                                    <label for="name">Agencia</label>
                                </div>
                            </div>
                            <div class="inputForms">
                                <div class="inputGroup">
                                    <input type="text" name="Numero" required="" autocomplete="off" value="{{ $conta->Numero }}">
                                    <label for="name">Numero da Conta</label>
                                </div>
                            </div>
                            <div class="botao-forms">
                                <button>Editar Conta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div id="overlay"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js/contaBancaria.js') }}"></script>
    
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
