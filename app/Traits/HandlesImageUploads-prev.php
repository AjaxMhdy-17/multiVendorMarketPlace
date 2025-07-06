<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait HandlesImageUploads
{
    public function uploadImage($file, $uploadPath, $width = null, $height = null)
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $name_gen = hexdec(uniqid()) . '.' . $extension;
        $destinationPath = public_path($uploadPath);

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Handle image file
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])) {
            $manager = new ImageManager(new Driver());
            $img = $manager->read($file);

            if ($width !== null && $height !== null) {
                $img->resize($width, $height);
            }

            $img->save($destinationPath . '/' . $name_gen);
        }
        // Handle PDF or other non-image file
        elseif ($extension === 'pdf') {
            $file->move($destinationPath, $name_gen);
        } else {
            // Optionally reject other file types
            return null;
        }

        return $uploadPath . '/' . $name_gen;
    }


    function resizeImage($imagePath, $width, $height)
    {
        list($originalWidth, $originalHeight, $type) = getimagesize($imagePath);
        switch ($type) {
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($imagePath);
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($imagePath);
                break;
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($imagePath);
                break;
            default:
                return false;
        }

        $newImage = imagecreatetruecolor($width, $height);
        if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
            imagecolortransparent($newImage, imagecolorallocatealpha($newImage, 0, 0, 0, 127));
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
        }
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);
        switch ($type) {
            case IMAGETYPE_JPEG:
                imagejpeg($newImage, $imagePath, 90);
                break;
            case IMAGETYPE_PNG:
                imagepng($newImage, $imagePath, 9);
                break;
            case IMAGETYPE_GIF:
                imagegif($newImage, $imagePath);
                break;
        }
        imagedestroy($image);
        imagedestroy($newImage);
        return true;
    }


    public function deleteImage($photo)
    {
        if ($photo != null && file_exists($photo)) {
            unlink($photo);
            return true;
        }
        return false;
    }
}
