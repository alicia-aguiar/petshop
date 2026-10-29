<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nome }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->senha}}</td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


