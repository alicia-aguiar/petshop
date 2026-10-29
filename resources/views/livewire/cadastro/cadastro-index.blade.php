<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Preço de custo</th>
                <th>Preço de venda</th>
                <th>Quantidade disponível</th>
                <th>Estoque mínimo</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($cadastro as $cadastro)
            <tr>
                <td>{{ $cadastro->id }}</td>
                <td>{{ $cadastro->nome }}</td>
                <td>{{ $cadastro->descricao }}</td>
                <td>{{ $cadastro->marca }}</td>
                <td>{{ $cadastro->categoria }}</td>
                <td>{{ $cadastro->preco_custo }}</td>
                <td>{{ $cadastro->preco_venda }}</td>
                <td>{{ $cadastro->qtd->disponivel }}</td>
                <td>{{ $cadastro->estoque_minimo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


