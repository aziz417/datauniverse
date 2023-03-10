<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileHandler
{
    public static function upload($image, $path, $size = null, $prefix = null)
    {
        $prefix = isset($prefix) ? $prefix : time();

        $image_name = 'dataleadsolution-'. $prefix . '-' . $size['width'] . 'x' . $size['height'] . '-' . $image->getClientOriginalName();

        $image_name = slug($image_name);

        $image_path = "uploads/$path/$image_name";

        if ($image->getClientOriginalExtension() == 'pdf' || $image->getClientOriginalExtension() == 'xlsx'){
            Storage::put($image_path, $image);
        }else{
            $resized_image = Image::make($image)->resize($size['width'], $size['height'])->stream();
            Storage::put($image_path, $resized_image);
        }
        return $image_path;
    }

    public static function delete($path)
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
}
