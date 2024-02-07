<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Image\Image;

class ProfilePhotoField extends Component
{
    use WithFileUploads;

    public Model $model;

    #[Validate('image|max:1024')]
    public $image;

    public ?string $croppedBlob;

    #[On('croppedImageReady')]
    public function handleCroppedImage($croppedBlob, $cropRegions)
    {
        Image::load($this->image->getRealPath())
            ->manualCrop($cropRegions['width'], $cropRegions['height'], $cropRegions['x'], $cropRegions['y'])
            ->save();

        $this->croppedBlob = $croppedBlob;

        $this->dispatch('profilePhoto', $this->image->getRealPath());
    }

    public function clearImage()
    {
        $this->image = null;
        $this->croppedBlob = null;
        $this->dispatch('profilePhoto', null);
    }

    public function updatedImage()
    {
        $this->dispatch('profilePhoto', $this->image->getRealPath());

        $this->dispatch('openModal', 'profile-photo-modal', [
            'temporaryUrl' => $this->image->temporaryUrl()
        ]);
    }

    public function render()
    {
        return view('livewire.profile-photo-field');
    }
}
