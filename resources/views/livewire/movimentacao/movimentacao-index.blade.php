<div class="mt-5">
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
                <th scope="col">Tipo</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Data</th>
                <th scope="col">ID Usuário</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimentacaos as $m)
            <tr>
                <th scope="row">{{$m->id}}</th>
                <td>{{$p->nome}}</td>
                <td>{{$m->tipo}}</td>
                <td>{{$m->quantidade_movimentada}}</td>
                <td>{{$m->data_movimentacao}}</td>
                <button wire:click='delete({{$m->id}})' class="btn btn-sm btn-danger">Excluir</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
