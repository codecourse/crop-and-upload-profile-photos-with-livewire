<div
    class="p-10"
    x-data="{
        cropper: null,
        cropRegion: null,
        dispatchCroppedImage () {
            this.cropper.getCroppedCanvas().toBlob(blob => {
                $dispatch('croppedImageReady', [URL.createObjectURL(blob), this.cropRegion])
                @this.closeModal()
            })
        }
    }"
    x-init="
        $nextTick(() => {
            cropper = new Cropper($refs.image, {
                autoCropArea: 1,
                viewMode: 1,
                aspectRatio: 1/1,
                crop (e) {
                    cropRegion = {
                        x: e.detail.x,
                        y: e.detail.y,
                        width: e.detail.width,
                        height: e.detail.height
                    }
                }
            })
        })
    "
>
    <div>
        <img src="{{ $temporaryUrl }}" x-ref="image" class="w-full max-w-full">
    </div>
    <x-secondary-button type="button" class="w-full justify-center mt-2" x-on:click="dispatchCroppedImage">
        Done
    </x-secondary-button>
</div>
