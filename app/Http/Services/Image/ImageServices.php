<?php

namespace App\Http\Services\Image;
use Intervention\Image\Facades\Image;

class ImageService extends ImageToolsService
{
    /**
     * Save the uploaded image.
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @return string|false
     */
    public function save($image)
    {
        $this->setImage($image);
        $this->provider();

        // Create image instance and save it
        $result = Image::make($image->getRealPath())
            ->save(public_path($this->getImageAddress()), 100, $this->getImageFormat()); // Set quality to 100 for best quality

        return $result ? $this->getImageAddress() : false;
    }

    /**
     * Fit and save the uploaded image.
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param int $width
     * @param int $height
     * @return string|false
     */
    public function fitAndSave($image, $width, $height)
    {
        $this->setImage($image);
        $this->provider();

        // Create image instance, fit it, and save it
        $result = Image::make($image->getRealPath())
            ->fit($width, $height)
            ->save(public_path($this->getImageAddress()), 100, $this->getImageFormat()); // Set quality to 100

        return $result ? $this->getImageAddress() : false;
    }

    public function createIndexAndSave($image) {

      
        
    }
}
