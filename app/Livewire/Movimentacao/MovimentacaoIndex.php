<?php

namespace App\Livewire\Movimentacao;

use App\Models\Movimentacao;
use Livewire\Component;

class MovimentacaoIndex extends Component
{
    public $search='';

    public function delete($id)
    {
        $movimentacao = Movimentacao::find($id);

        if ($movimentacao != null) {
            $movimentacao->delete();
            session()->flash('success', 'Excluído');
        }
    }

    public function render()
    {
        $movimentacaos = Movimentacao::where('tipo', 'like', '%'.$this->search.'%' )->get();
         return view('livewire.movimentacao.movimentacao-index', compact('movimentacaos'));
    }

}
