@if (session('success'))
<div id="mensagem" class="flash-message">
    {{ session('success') }}
</div>
<script>
    setTimeout(function() {
        $('#mensagem').fadeOut('slow');
    }, 3500);
</script>
@endif

@if (session('danger'))
<div id="mensagem-erro" class="flash-message-erro">
    {{ session('danger') }}
</div>
<script>
    setTimeout(function() {
        $('#mensagem-erro').fadeOut('slow');
    }, 3500);
</script>
@endif