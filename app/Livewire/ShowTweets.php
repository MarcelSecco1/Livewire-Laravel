<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
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

    public $message = 'Apenas um teste';
}
