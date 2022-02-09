<?php

namespace Modules\Media\Services;

class ImageFileService
{

    public static function upload($file)
    {

        $name = uniqid();
        $extension = $file->getClientOriginalExtension();
        $dir = 'uploads/images/';
        $year_folder = $dir . date("Y");
        $month_folder = $year_folder . '/' . date("m");
        $dir = $month_folder;
        !file_exists($year_folder) && mkdir($year_folder, 0777,true);
        !file_exists($month_folder) && mkdir($month_folder, 0777,true);
        $file->move(public_path($dir), $name . '.' . $extension);
        $path = $dir . '\\' . $name . '.' . $extension;

    }

}
