<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilePhotoField extends Component
{
    use WithFileUploads;

    public Model $model;

    #[Validate('image|max:1024')]
    public $image;

    public string $croppedBlob;

    #[On('croppedImageReady')]
    public function handleCroppedImage($croppedBlob, $cropRegions)
    {
        $this->croppedBlob = $croppedBlob;
    }

    public function updatedImage()
    {
        $this->dispatch('openModal', 'profile-photo-modal', [
            'temporaryUrl' => $this->image->temporaryUrl()
        ]);
    }

    public function render()
    {
        return view('livewire.profile-photo-field');
    }
}
