<?php

namespace App\Livewire\Movimentacao;

use App\Models\Produto;
use Livewire\Component;

class MovimentacaoCreate extends Component
{
    public $produtos;
    public $idProduto;
    public $tipo = 'saida';
    public $quantidade_movimentada;
    public $data_movimentacao;
    public $alertaEstoque;

    public function mount(){
        $this->produtos = Produto::orderBy('nome')->get();
        $this->data_movimentacao = now()->format('Y-m=d');
    }


    public function render()
    {
        return view('livewire.movimentacao.movimentacao-create');
    }
}
