<h1> nova pagina de cadastro </h1>

<form method="POST">
    @csrf

    <div class="field input-field">
        <input type="text" name="Nome" class="input" placeholder="Nome">
    </div>

    <div class="field input-field">
        <input type="text" name="Tipo" class="input" placeholder="Tipo">
    </div>
    <div class="field input-field">
        <input type="number" name="valor" class="input" placeholder="valor">
    </div>
    <div>
        <input type="hidden" name="id_conta_selecionada" value="{{ session('id_conta_selecionada') }}">
    </div>
    <label for="cars">Selecione um centro de custo:</label>
    <select name="centro">
        @foreach ($centrocusto as $centro)
            <option value={{ $centro->id }}>{{ $centro->Nome }}</option>
        @endforeach
    </select>

    <div class="field button-field">
        <button>Cadastrar Conta </button>
    </div>

</form>
