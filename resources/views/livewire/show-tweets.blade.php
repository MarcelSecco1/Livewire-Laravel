<div class="" style="color: white;">
    Show Tweets
    <p>{{ $content }}</p>


    <form method="post" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content" style="color: black;">
        {{-- se existe um erro ele exibe a messagem do erro --}}
        @error('content')
            {{ $message }}
        @enderror

        <button type="submit">Criar Tweet</button>
    </form>

    <hr>


    @foreach ($tweets as $tweet)
        @if ($tweet->user->profile_photo_path)
            <img src="{{ url("storage/{$tweet->user->profile_photo_path}") }}" alt="imgPerfil">
        @else
            <img src="https://cdn-icons-png.flaticon.com/512/5987/5987462.png" alt="imgPerfil">
        @endif
        {{ $tweet->user->name }} - {{ $tweet->content }}


        @if ($tweet->likes->count())
            <a href="#" wire:click.prevent="unlike({{ $tweet->id }})">Descurtir</a><br>
        @else
            <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a> <br>
        @endif
    @endforeach

    <hr>
    <div class="">
        {{ $tweets->links() }}
    </div>
</div>
