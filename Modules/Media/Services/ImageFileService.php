<?php

namespace Modules\Media\Services;

class ImageFileService
{

    public static function upload($file)
    {

        $name = uniqid();
        $extension = $file->getClientOriginalExtension();
        $dir = 'app\public';
        $file->move(storage_path($dir), $name . '.' . $extension);
        $path = $dir . '\\' . $name . '.' . $extension;
    }

}
