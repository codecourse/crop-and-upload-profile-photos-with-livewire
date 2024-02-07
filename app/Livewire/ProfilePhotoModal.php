<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ProfilePhotoModal extends ModalComponent
{
    public $temporaryUrl;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.profile-photo-modal');
    }
}
