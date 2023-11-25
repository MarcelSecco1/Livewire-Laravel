<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $content = 'Apenas um teste';

    //validações
    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        //retorna todos os tweets e possui o relacionamento com o user
        $tweets = Tweet::with('user')->get();

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
