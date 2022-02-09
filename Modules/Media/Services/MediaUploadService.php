<?php

namespace Modules\Media\Services;

class MediaUploadService
{

    public static function upload($file)
    {
        $extension = strtolower($file->getClientOriginalExtension());

        switch ($extension) {
            case 'jpg':
            case 'png':
            case 'jpeg':
            case 'gif':
                ImageFileService::upload($file);
                break;

            case 'zip':
            case 'rar':
            case 'tar':
            case '7z':
                ZipFileService::upload($file);
                break;

            case 'doc':
            case 'docx':
            case 'pdf':
            case 'xlsx':
                DocFileService::upload($file);
                break;

            case 'mp4':
            case 'mkv':
            case 'mov':
            case 'wmv':
            case 'avi':
                VideoFileService::upload($file);
                break;

            case 'mp3':
            case 'flac':
            case 'wav':
                AudioFileService::upload($file);
                break;

        }
    }

}
