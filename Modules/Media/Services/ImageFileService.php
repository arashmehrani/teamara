<?php

namespace Modules\Media\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageFileService
{

    protected static $sizes = ['150', '300', '800'];

    public static function upload($file)
    {


        $name = uniqid();
        $extension = $file->getClientOriginalExtension();
        $dir = 'uploads\images\\';
        $year_folder = $dir . date("Y");
        $month_folder = $year_folder . '\\' . date("m") . '\\';
        $dir = $month_folder;
        !file_exists($year_folder) && mkdir($year_folder, 0777, true);
        !file_exists($month_folder) && mkdir($month_folder, 0777, true);
        $file->move(public_path($dir), $name . '.' . $extension);
        $path = $dir . $name . '.' . $extension;

        return self::resize(public_path($path), $dir, $name, $extension);

    }

    private static function resize($image, $dir, $name, $extension)
    {
        $image = Image::make($image);
        $images['original'] = $dir . $name . '.' . $extension;
        foreach (self::$sizes as $size) {
            $images[$size] = $dir . $name . '_' . $size . 'x' . $size . '.' . $extension;
            $image->resize($size, null, function ($aspect) {
                $aspect->aspectRatio();
            })->save(public_path($dir) . $name . '_' . $size . 'x' . $size . '.' . $extension);
        }

        return $images;

    }

    public static function delete($media)
    {
        foreach ($media->files as $file) {
            File::delete($file);
        }
    }

}
