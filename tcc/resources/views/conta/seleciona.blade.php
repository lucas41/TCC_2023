<h1>Contas Bancárias do Usuário</h1>

@if ($contasBancarias->isEmpty())
    <p>Nenhuma conta bancária encontrada.</p>
@else
    <ul>
        @foreach ($contasBancarias as $conta)
            <li>
                <a href="{{ route('selecionarContaid', ['id' => $conta->id]) }}">
                <strong>ID:</strong> {{ $conta->id }}<br>
                <strong>Banco:</strong> {{ $conta->Nome_banco }}<br>
                <strong>Agência:</strong> {{ $conta->Agencia }}<br>
                <strong>Número:</strong> {{ $conta->Numero }}<br>
                <!-- Se você tiver outros campos na tabela, exiba-os aqui também -->
            </li>
            <br>
        @endforeach
    </ul>
@endif