<div">
    <h1 class="text-4xl py-6 font-bold h-24 text-white">Tweets</h1>


    <form method="post" wire:submit.prevent="create" class="shadow-md rounded px-8 pt-6 pb-8 mb-8">
        <textarea name="content" id="content" rows="3" placeholder="O que está pensando?" wire:model="content" cols="33"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror"></textarea>
        @error('content')
            {{-- se existe um erro ele exibe a messagem do erro --}}
            <p><span class="text-red-500">{{ $message }}</span></p>
        @enderror
        <button type="submit" class="bg-blue-900 text-white p-2 pl-6 pr-6 rounded text-center">Criar Tweet</button>
    </form>




    @foreach ($tweets as $tweet)
        <div class="flex m-8 shadow-md rounded p-4 mt-5 bg-white" >
            <div class="w-1/8 pl-3 text-center">
                @if ($tweet->user->profile_photo_path)
                    <img src="{{ url("storage/{$tweet->user->profile_photo_path}") }}" alt="imgPerfil"
                        class="rounded-full w-8 h-8">
                @else
                    <img src="https://cdn-icons-png.flaticon.com/512/5987/5987462.png" alt="imgPerfil"
                        class="rounded-full w-8 h-8">
                @endif
            </div>
            <div class="w-7/8 pl-3 inline-block align-text-middle">
                <span class="mt-2">{{ $tweet->user->name }} - {{ $tweet->content }}</span>
                @if ($tweet->likes->count())
                    <a href="#" wire:click.prevent="unlike({{ $tweet->id }})">( Descurtir )</a><br>
                @else
                    <a href="#" wire:click.prevent="like({{ $tweet->id }})">( Curtir ) </a> <br>
                @endif
            </div>
        </div>
    @endforeach

    <div class="py-12" style="color: white;">
        {{ $tweets->links() }}
    </div>
</div>
