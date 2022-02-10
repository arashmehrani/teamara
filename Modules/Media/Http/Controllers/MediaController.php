<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Media\Entities\Media;
use Modules\Media\Services\MediaFileService;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $medias = Media::orderBy('created_at', 'desc')->paginate(10);
        return view('media::media', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('media::media-new');
    }


    public function store(Request $request)
    {
        MediaFileService::upload($request->file('file'), $request);

        return redirect()->route('media')->with('added', 'فایل ارسالی با موفقیت بارگذاری شد.');
    }


    public function show($id)
    {
        return view('media::show');
    }


    public function edit($id)
    {
        return view('media::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        $media = Media::findOrfail($id);
        MediaFileService::delete($media);
        $media->delete();
        return response()->json(['message' => 'فایل مورد نظر با موفقیت حذف شد!'], Response::HTTP_OK);
    }
}
