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
            <h3>Centros de Custo</h3>
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
                                <a href="#" id="openModalLink"
                                    data-target-modal="myModal_{{ $centro->id }}">Editar Informações</a>
                                <a href="{{ route('apagarcentroid', ['id' => $centro->id]) }}">Apagar Conta</a>
                            </div>
                        </div>
                    </div>
                    <div class="body-card-conta">
                        <p>Valor planjeado R$ {{ $centro->valplanejado }}</p>
                        <p>Valor utilizado R$ {{ $centro->valatual }}</p>
                        <p>Valor atual R$ {{ $centro->valplanejado - $centro->valatual }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        @foreach ($centrocusto as $centro)
            <div id="myModal_{{ $centro->id }}" class="modal">
                <div class="modal-header">
                    <h2>Editar Conta</h2>
                    <button id="closeModalBtn" class="btn-modal-fechar">Fechar</button>
                </div>
                <div class="modal-body">
                    <div class="modal-form">
                        <form method="POST" action="{{ route('CentroCusto.update', $centro->id) }}">
                            @csrf
                            <div class="inputForms">
                                <div class="inputGroup">
                                    <input type="text" name="Nome" required="" autocomplete="off"
                                        value="{{ $centro->Nome }}">
                                    <label for="name">Nome</label>
                                </div>
                            </div>
                            <div class="inputForms">
                                <div class="inputGroup">
                                    <input type="text" name="valplanejado" required="" autocomplete="off"
                                        value="{{ $centro->valplanejado }}">
                                    <label for="name">Valor planjeado</label>
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="{{ asset('js/CentroCusto.js') }}"></script>
    </div>
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
