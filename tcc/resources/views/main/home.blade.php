

<?php
$nome = session('nome');
$id = session('id');
echo("seja bem vindo  $id");

?>

<h1>Contas Bancárias do Usuário</h1>

@if ($contasBancarias->isEmpty())
    <p>Nenhuma conta bancária encontrada.</p>
@else
    <ul>
        @foreach ($contasBancarias as $conta)
            <li>
                <strong>ID:</strong> {{ $conta->id }}<br>
                <strong>Banco:</strong> {{ $conta->Nome_banco }}<br>
                <strong>Agência:</strong> {{ $conta->Agencia }}<br>
                <strong>Número:</strong> {{ $conta->Numero }}<br>
                <!-- Se você tiver outros campos na tabela, exiba-os aqui também -->
            </li>
        @endforeach
    </ul>
@endif




<a href="/logout">Sair</a>