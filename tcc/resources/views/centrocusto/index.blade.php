<h1> nova pagina de cadastro </h1>

<form method="POST">
    @csrf

    <div class="field input-field">
        <input type="text" name="nome" class="input" placeholder="Nome do Centro de custo">
    </div>

    <div class="field input-field">
        <input type="text" name="tipo" class="input" placeholder="Tipo">
    </div>
    
    <div>
        <input type="hidden" name="id_conta_selecionada" value="{{ session('id_conta_selecionada') }}">
    </div>


    <div class="field button-field">
        <button>Cadastrar Centro de custo </button>
    </div>

</form>