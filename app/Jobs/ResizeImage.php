<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    private string $path;
    private int $width;
    private int $height;

    public function __construct(string $path, int $width, int $height)
    {
        $this->path = $path;
        $this->width = $width;
        $this->height = $height;
    }

    public function handle(): void
    {
        $filePath = storage_path('app/public/' . $this->path);

        if (!file_exists($filePath)) {
            return;
        }

        $imageInfo = getimagesize($filePath);
        if (!$imageInfo) {
            return;
        }

        [$originalWidth, $originalHeight, $imageType] = $imageInfo;

        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $source = imagecreatefromjpeg($filePath);
                break;
            case IMAGETYPE_PNG:
                $source = imagecreatefrompng($filePath);
                break;
            case IMAGETYPE_GIF:
                $source = imagecreatefromgif($filePath);
                break;
            default:
                return;
        }

        if (!$source) {
            return;
        }

        $destination = imagecreatetruecolor($this->width, $this->height);

        if ($imageType === IMAGETYPE_PNG || $imageType === IMAGETYPE_GIF) {
            imagealphablending($destination, false);
            imagesavealpha($destination, true);
        }

        imagecopyresampled(
            $destination,
            $source,
            0,
            0,
            0,
            0,
            $this->width,
            $this->height,
            $originalWidth,
            $originalHeight
        );

        switch ($imageType) {
            case IMAGETYPE_JPEG:
                imagejpeg($destination, $filePath, 90);
                break;
            case IMAGETYPE_PNG:
                imagepng($destination, $filePath);
                break;
            case IMAGETYPE_GIF:
                imagegif($destination, $filePath);
                break;
        }

        imagedestroy($source);
        imagedestroy($destination);
    }
}
