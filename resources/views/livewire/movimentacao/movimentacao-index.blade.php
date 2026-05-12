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

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Produto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Data</th>
                <th scope="col">Usuário</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimentacaos as $m)
            <tr>
                <td>{{$m->produto->id}} - {{$m->produto->nome}}</td>
                <td>@if($m->tipo == 'ENTRADA')
                    <span class="badge bg-primary">ENTRADA</span>
                    @else
                    <span class="badge bg-danger">SAÍDA</span>
                    @endif
                </td>
                <td>{{$m->quantidade}}</td>
                <td>{{\Carbon\Carbon::parse($m->data_movimentacao)
                    ->format('d-m-Y')}}</td>
                <td>{{$m->user_id}} - {{$m->user->name}}</td>
                <td><button wire:click='delete({{$m->id}})' class="btn btn-sm btn-danger">Excluir</button></td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>