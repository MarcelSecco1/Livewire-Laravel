<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $content = 'Apenas um teste';

    public function render()
    {
        $tweets = Tweet::with('user')->get();

        return view(
            'livewire.show-tweets',
            [
                'tweets' => $tweets
            ]
        );
    }



    public function create()
    {
        Tweet::create([
            'content' => $this->content,
            'user_id' => 1
        ]);

        $this->content = '';
    }
}
