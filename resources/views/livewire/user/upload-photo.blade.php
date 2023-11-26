<div style="color: white;">
    <h1>Envio de Fotos</h1>
    <form method="post" wire:submit.prevent="storagePhoto">
        <input type="file" wire:model="photo">
        @error('photo')
            {{ $message }}
        @enderror
        <button type="submit">Enviar</button>
    </form>


</div>
