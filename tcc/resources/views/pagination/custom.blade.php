<ul class="pagination">
    <!-- Link "anterior" -->
    @if ($paginator->onFirstPage())
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo;</span>
        </li>
    @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
    @endif

    <!-- Links de página -->
    @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
            <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        <!-- Página atual -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    <!-- Link "próximo" -->
    @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        </li>
    @else
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&rsaquo;</span>
        </li>
    @endif
</ul>

<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a,
    .pagination li span {
        display: block;
        padding: 10px;
        text-decoration: none;
        border: 1px solid #007bff; /* Cor azul */
        color: #007bff; /* Cor do texto azul */
        border-radius: 5px;
    }

    .pagination li.active span {
        background-color: #007bff; /* Cor de fundo azul para a página atual */
        color: #fff; /* Cor do texto branco para a página atual */
    }

    .pagination li.disabled span,
    .pagination li.disabled a {
        color: #aaa; /* Cor do texto cinza para os botões desativados */
        pointer-events: none; /* Desabilita eventos de clique nos botões desativados */
    }
</style>
