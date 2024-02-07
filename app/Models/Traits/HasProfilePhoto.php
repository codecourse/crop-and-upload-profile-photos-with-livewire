<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Storage;

trait HasProfilePhoto
{
    public function profilePhotoUrl()
    {
        if ($this->profile_photo_url) {
            return Storage::disk('local')->url($this->profile_photo_url);
        }

        return $this->defaultProfilePhotoUrl();
    }

    public function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }
}
