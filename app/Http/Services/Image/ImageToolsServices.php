<?php

namespace App\Http\Services\Image;

class ImageToolsService
{
    protected $image;
    protected $exclusiveDirectory;
    protected $imageDirectory;
    protected $imageName;
    protected $imageFormat;
    protected $finalImageDirectory;
    protected $finalImageName;

    //----------------------
    public function setImage($image)
    {
        $this->image = $image;
    }
    //----------------------
    public function getexclusiveDirectory()
    {
        $this->exclusiveDirectory;
    }
    //----------------------
    public function setexclusiveDirectory($exclusiveDirectory)
    {
        $this->exclusiveDirectory = trim($exclusiveDirectory, '/\\');
    }
    //----------------------
    public function getImageDirectory()
    {
        return $this->imageDirectory;
    }
    //----------------------
    public function setImageDirectory($imageDirectory)
    {
        $this->imageDirectory = trim($imageDirectory, '/\\');
    }
    //----------------------
    public function getImageName()
    {
        return $this->imageName;
    }
    //----------------------
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }
    //----------------------
    public function setCurrentImageName()
    {
        return !empty($this->image) ? $this->setImageName(pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME)) : false;
    }
    //----------------------

    public function getImageFormat()
    {
        return $this->imageFormat;
    }
    //----------------------
    public function setImageFormat($imageFormat)
    {
        return $this->imageFormat = $imageFormat;
    }
    //----------------------
    public function getFinalImageDirectory()
    {
        return $this->finalImageDirectory;
    }
    //----------------------
    public function setFinalImageDirectory($finalImageDirectory)
    {
        $this->finalImageDirectory = $finalImageDirectory;
    }
    //----------------------
    public function getFinalImageName()
    {
        return $this->finalImageName;
    }
    //----------------------
    public function setFinalImageName($finalImageName)
    {
        $this->finalImageName = $finalImageName;
    }
    //----------------------
    protected function checkDirectory($imageDirectory)
    {
        mkdir($imageDirectory, 666, true);
    }
    //----------------------
    public function getImageAddress()
    {
        return $this->finalImageDirectory . DIRECTORY_SEPARATOR . $this->finalImageName;
    }
    //----------------------
    protected function provider()
    {
        $this->getImageDirectory() ?? $this->setImageDirectory(date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
        $this->getImageName() ?? $this->setImageName(time());
        $this->getImageFormat() ?? $this->setimageFormat($this->image->extension());


        $finalImageDirectory = empty($this->getexclusiveDirectory()) ? $this->getImageDirectory()
            : $this->getexclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getImageDirectory();
        $this->setFinalImageDirectory($finalImageDirectory);

        $this->setFinalImageName($this->getImageName() . '.' . $this->getImageFormat());

        $this->checkDirectory($this->getFinalImageDirectory());
    }
}


















    // public function __construct($image, $imageDirectory, $exclusiveDirectory = null)
    // {
    //     $this->image = $image;
    //     $this->imageDirectory = $imageDirectory;
    //     $this->exclusiveDirectory = $exclusiveDirectory;
    //     $this->imageName = pathinfo($image, PATHINFO_FILENAME);
    //     $this->imageFormat = pathinfo($image, PATHINFO_EXTENSION);
    // }

    // public function setFinalImageDirectory($directory)
    // {
    //     $this->finalImageDirectory = $directory;
    // }

    // public function setFinalImageName($name)
    // {
    //     $this->finalImageName = $name;
    // }

    // public function processImage()
    // {
    //     // Add your image processing logic here
    //     // For example, resizing, cropping, etc.
    // }

    // public function saveImage()
    // {
    //     // Logic to save the processed image
    // }
