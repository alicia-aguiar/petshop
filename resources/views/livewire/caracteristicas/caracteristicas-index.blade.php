<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marcas</th>
                <th>Categorias</th>
                <th>Unidades de medida</th>
                <th>Tamanho das embalagens</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($caracteristicas as $caracteristica)
            <tr>
                <td>{{ $caracteristica->id }}</td>
                <td>{{ $caracteristica->marcas }}</td>
                <td>{{ $caracteristica->categorias }}</td>
                <td>{{ $caracteristica->unidade_medida }}</td>
                <td>{{ $caracteristica->tamanho_embalagens }}</td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


