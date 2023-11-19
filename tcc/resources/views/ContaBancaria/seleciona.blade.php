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
            <h3>Minhas Contas teste</h3>
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
                                <input type="number" name="saldo" required="" autocomplete="off">
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
                                    <a href="#" id="openModalLink">Abrir Modal</a>
                                <a href="{{ route('apagarContaid', ['id' => $conta->id]) }}">Apagar Conta</a>
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
        <div id="myModal">
          <p>Conteúdo do modal. Isso pode incluir formulários, texto, etc.</p>
          <button id="closeModalBtn">Fechar Modal</button>
        </div>
      
        <!-- Overlay para escurecer o fundo quando o modal estiver aberto -->
        <div id="overlay"></div>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="{{ asset('js/contaBancaria.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
   var openModalLink = document.getElementById("openModalLink");
   var closeModalBtn = document.getElementById("closeModalBtn");
   var myModal = document.getElementById("myModal");
   var overlay = document.getElementById("overlay");

   // Função para abrir o modal
   function openModal() {
     myModal.style.display = "block";
     overlay.style.display = "block";
   }

   // Função para fechar o modal
   function closeModal() {
     myModal.style.display = "none";
     overlay.style.display = "none";
   }

   // Adiciona eventos aos elementos
   openModalLink.addEventListener("click", openModal);
   closeModalBtn.addEventListener("click", closeModal);
 });
     </script>

</body>

</html>
