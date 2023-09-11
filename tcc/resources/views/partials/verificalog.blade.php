@if (session('success'))
    <div id="mensagem" class="flash-message">
        {{ session('success') }}
    </div>
@endif

@if (session('danger'))
    <div id="mensagem-erro" class="flash-message-erro">
        {{ session('danger') }}
    </div>
@endif

<style>
    .flash-message {
        position: fixed;
        top: 10%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background-color: #4caf50;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        margin-bottom: 15px;
    }

    .flash-message-erro {
        position: fixed;
        top: 10%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background-color: #FF0000;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        margin-bottom: 15px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Função para esconder as mensagens de sucesso e erro
    function hideMessages() {
        $('#mensagem, #mensagem-erro').fadeOut('slow');
    }

    // Esconder as mensagens após o carregamento da página
    $(document).ready(function() {
        setTimeout(hideMessages, 3500);
    });
</script>
