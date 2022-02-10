<?php

namespace Modules\Media\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PrivateFileService
{

    public static function upload($file)
    {
        $name = $file->getClientOriginalName() . '_' . uniqid();
        $extension = $file->getClientOriginalExtension();
        $dir = 'private\\';
        $year_folder = $dir . date("Y");
        $month_folder = $year_folder . '\\' . date("m") . '\\';
        $dir = $month_folder;
        !file_exists($year_folder) && mkdir($year_folder, 0777, true);
        !file_exists($month_folder) && mkdir($month_folder, 0777, true);
        Storage::putFileAs($dir, $file, $name . '.' . $extension);
        return ["original" => $dir . $name . '.' . $extension];
    }

    public static function delete($media)
    {
        foreach ($media->files as $file) {
            File::delete($file);
        }
    }

}
