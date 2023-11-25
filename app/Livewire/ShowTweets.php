<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    //importa a paginação
    //tira o reload da pagina
    //cria a paginação
    use WithPagination;

    public $content = 'Apenas um teste';

    //validações
    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        //retorna todos os tweets com a paginacao de 2 em 2
        // possui o relacionamento com o user usando o with
        $tweets = Tweet::with('user')->paginate(2);

        return view(
            'livewire.show-tweets',
            [
                //passa os tweets para a view
                'tweets' => $tweets
            ]
        );
    }



    public function create()
    {
        //chama as validações
        $this->validate();

        //metodo de criação de tweet
        Tweet::create([
            'content' => $this->content,
            'user_id' => 1
        ]);

        //limpa o campo de tweet
        $this->content = '';
    }
}
