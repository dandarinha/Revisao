<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoEdit extends Component
{
    public $produto_id;
    public $nome;
    public $valor;
    public $qtd_estoque;
    public $qtd_minima;

    public function mount($id){
        $produto = Produto::find($id);
        if ($produto == null){
            session()->flash('error','Não encontrado');
        return redirect()->route('produto.index');
        }

        $this->produto_id = $produto->produto_id;        
        $this->nome = $produto->nome;
        $this->valor = $produto->valor;
        $this->qtd_estoque = $produto->qtd_estoque;
        $this->qtd_minima = $produto->qtd_minima;
    }


    public function render()
    {
        return view('livewire.produto.produto-edit');
    }
}
