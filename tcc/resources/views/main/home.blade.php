

<?php
$nome = session('nome');
$id = session('id');
$conta = session('id_conta_selecionada');
echo("seja bem vindo  $nome");
echo("<br>");
echo("A conta selecionada e a conta de id $conta");
?>


<br>
<a href="/aplicacao/cadastroConta"> Cadastrar conta </a>
<br>
<a href="/aplicacao/selecionaconta"> Selecionar conta </a>
<br>
<a href="/logout">Sair</a>