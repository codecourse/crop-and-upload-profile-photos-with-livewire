<div
    class="p-10"
    x-data="{
        cropper: null
    }"
    x-init="
        $nextTick(() => {
            cropper = new Cropper($refs.image, {
                autoCropArea: 1,
                viewMode: 1,
                aspectRatio: 1/1
            })
        })
    "
>
    <div>
        <img src="{{ $temporaryUrl }}" x-ref="image" class="w-full max-w-full">
    </div>
</div>
