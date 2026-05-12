<?php

namespace App\Livewire\Movimentacao;

use App\Models\Movimentacao;
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

    public function mount()
    {
        $this->produtos = Produto::orderBy('nome')->get();
        $this->data_movimentacao = now()->format('d-m-Y');
    }


    public function render()
    {
        return view('livewire.movimentacao.movimentacao-create');
    }

    public function store()
    {
        $produto = Produto::find($this->idProduto);
        if ($produto->qtd_estoque < $this->quantidade_movimentada && $this->tipo == "saida") {
            $this->addError('quantidade_movimentada', 'ESTOQUE INSUFICIENTE');
            return;
        }

        if ($this->tipo == "entrada") {
            //$produto->increment(qtd_estoque, $this->quantidade_movimentada)
            $produto->qtd_estoque += $this->quantidade_movimentada;
        } else {
            //$produto->decrement(qtd_estoque, $this->quantidade_movimentada)
            $produto->qtd_estoque -= $this->quantidade_movimentada;
        }

        Movimentacao::create([
            'quantidade' => $this->quantidade_movimentada,
            'data_movimentacao' => $this->data_movimentacao,
            'tipo' => $this->tipo,
            'produto_id' => $this->idProduto,
            //'user_id' => $this->user_id,
            'user_id' => 1
        ]);

        $produto->update();

        // verificar estoque baixo
        $produto->refresh();
        if ($produto->qtd_estoque < $produto->qtd_minima) {
            $this->alertaEstoque = "ALERTA: Estoque baixo para {$produto->nome}. 
        Quantidade Atual : {$produto->qtd_estoque}";
        } else {
            $this->alertaEstoque = "";
        }

        session()->flash('message', 'Movimentação registrada com sucesso');
        $this->reset(['quantidade_movimentada', 'tipo']);
        $this->produtos = Produto::orderBy('nome')->get();
    }
}
