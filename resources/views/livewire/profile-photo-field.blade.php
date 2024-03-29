<div class="flex items-center space-x-3">
    <img src="{{ $croppedBlob ? $croppedBlob : ($image ? $image->temporaryUrl() : $model->profilePhotoUrl()) }}" class="rounded-lg size-12">
    <input type="file" name="profile_photo" id="profile_photo" class="sr-only" wire:model="image">

    @if (!$image)
        <label for="profile_photo" class="text-sm text-indigo-500">Choose photo</label>
    @endif

    @if ($image)
        <button type="button" class="text-sm text-indigo-500" wire:click="clearImage">Clear</button>
    @endif
</div>
