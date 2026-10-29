<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rações</th>
                <th>Medicamentos</th>
                <th>Produtos de higiene</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->racoes }}</td>
                <td>{{ $produto->medicamentos }}</td>
                <td>{{ $produto->produtos_higiene }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


