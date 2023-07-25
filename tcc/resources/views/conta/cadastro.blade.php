<h1> nova pagina de cadastro </h1>

<form method="POST">
    @csrf

    <div class="field input-field">
        <input type="text" name="Nome_banco" class="input" placeholder="Nome do banco">
    </div>

    <div class="field input-field">
        <input type="text" name="Agencia" class="input" placeholder="Agencia">
    </div>
    
    <div class="field input-field">
        <input type="text" name="Numero" class="input" placeholder="Numero">
    </div>


    <div class="field button-field">
        <button>Cadastrar Conta </button>
    </div>

</form>