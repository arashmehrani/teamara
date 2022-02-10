<?php

namespace Modules\Media\Services;

use Illuminate\Support\Facades\Auth;
use Modules\Media\Entities\Media;

class MediaFileService
{

    public static function upload($file, $request)
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $media = new Media();
        if ($request->has('private')) {
            $private = $request->private;
            if ($private == true) {
                $media->files = PrivateFileService::upload($file);
                $media->type = 'private';
                $media->title = $request->title;
                $media->description = $request->description;
                $media->user_id = Auth::id();
                $media->private = true;
                $media->name = $file->getClientOriginalName();
                $media->save();
                return $media;
            }
        }

        switch ($extension) {
            case 'jpg':
            case 'png':
            case 'jpeg':
            case 'gif':
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
                $media->files = ZipFileService::upload($file);
                $media->type = 'zip';
                $media->title = $request->title;
                $media->description = $request->description;
                $media->user_id = Auth::id();
                $media->name = $file->getClientOriginalName();
                $media->save();
                return $media;
                break;

            case 'doc':
            case 'docx':
            case 'pdf':
            case 'xlsx':
            case 'txt':
                $media->files = DocFileService::upload($file);
                $media->type = 'doc';
                $media->title = $request->title;
                $media->description = $request->description;
                $media->user_id = Auth::id();
                $media->name = $file->getClientOriginalName();
                $media->save();
                return $media;
                break;

            case 'mp4':
            case 'mkv':
            case 'mov':
            case 'wmv':
            case 'avi':
                $media->files = VideoFileService::upload($file);
                $media->type = 'video';
                $media->title = $request->title;
                $media->description = $request->description;
                $media->user_id = Auth::id();
                $media->name = $file->getClientOriginalName();
                $media->save();
                return $media;
                break;

            case 'mp3':
            case 'flac':
            case 'wav':
                $media->files = AudioFileService::upload($file);
                $media->type = 'audio';
                $media->title = $request->title;
                $media->description = $request->description;
                $media->user_id = Auth::id();
                $media->name = $file->getClientOriginalName();
                $media->save();
                return $media;
                break;

        }
    }

    public static function delete($media)
    {
        switch ($media->type) {
            case 'image':
                ImageFileService::delete($media);
                break;
            case 'zip':
                ZipFileService::delete($media);
                break;
            case 'doc':
                DocFileService::delete($media);
                break;
            case 'audio':
                AudioFileService::delete($media);
                break;
            case 'video':
                VideoFileService::delete($media);
                break;
            case 'private':
                PrivateFileService::delete($media);
                break;
            case 'other':
                OtherFileService::delete($media);
                break;
        }
    }
}
