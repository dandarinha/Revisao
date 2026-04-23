<div class="mt-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Qtd. Estoque</th>
                <th scope="col">Qtd. Mínima</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $p)
            <tr>
                <th scope="row">{{$p->id}}</th>
                <td>{{$p->nome}}</td>
                <td>{{$p->valor}}</td>
                <td>{{$p->qtd_estoque}}</td>
                <td>{{$p->qtd_minima}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>