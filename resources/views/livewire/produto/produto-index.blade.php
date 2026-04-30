<div class="mt-5">
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif

     @if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif

    <div class="mb-3">
        <input type="text" wire:model.live='search' placeholder="pesquisar..." class="form-control">
    </div>


    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Qtd. Estoque</th>
                <th scope="col">Qtd. Mínima</th>
                <th scope="col">Ações</th>
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
                <td> <a href="{{route('produto.edit', ['id' => $p->id])}}" class="btn btn-sm btn-info">Editar</a>
                <button wire:click='delete({{$p->id}})' class="btn btn-sm btn-danger">Excluir</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>