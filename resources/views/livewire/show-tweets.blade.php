<div>
    Show Tweets
    <p>{{$content}}</p>


    <form method="post" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content">
        {{-- se existe um erro ele exibe a messagem do erro--}}
        @error('content')
            {{$message}}
        @enderror

        <button type="submit">Criar Tweet</button>
    </form>

    <hr>


    @foreach ($tweets as $tweet)
        {{$tweet->user->name}} - {{$tweet->content}} <br>
    @endforeach
</div>
