<?php

namespace Modules\Media\Services;

use Illuminate\Support\Facades\Auth;
use Modules\Media\Entities\Media;

class MediaUploadService
{

    public static function upload($file, $request)
    {
        $extension = strtolower($file->getClientOriginalExtension());

        switch ($extension) {
            case 'jpg':
            case 'png':
            case 'jpeg':
            case 'gif':
                $media = new Media();
                $media->files = ImageFileService::upload($file);
                $media->type = 'image';
                $media->title = $request->title;
                $media->description = $request->description;
                $media->user_id = Auth::id();
                $media->name = $file->getClientOriginalName();
                $media->save();
                return $media;
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
