<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public $photo;

    public function storagePhoto()
    {
        $this->validate([
            'photo' => 'required|image|max:2048'
        ]);

        $nameFile = Str::Slug(auth()->user()->name) . '.' . $this->photo->getClientOriginalExtension();

        $user = auth()->user();
        $path = $this->photo->storeAs("public/". $nameFile);
        
        if ($path) {
            $path2 = $nameFile;
            $user->update([
                'profile_photo_path' => $path2
            ]);
        }

        return redirect()->route('tweets');
    }
}
