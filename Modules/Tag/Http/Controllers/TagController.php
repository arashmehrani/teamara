<?php

namespace Modules\Tag\Http\Controllers;

use App\Helpers\Helpers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tag\Entities\Tag;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::where('type', null)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        if ($request->get('search')) {
            $search = $request->get('search');
            $tags = Tag::where('type', null)
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('slug', 'like', '%' . $search . '%')
                ->orWhere('meta_desc', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('tag::tags', compact('tags'));
    }

    public function new(Request $request, Tag $tag)
    {
        if ($request->slug != null) {
            $slug = Helpers::makeSlug($request->slug);
        } else {
            $slug = Helpers::makeSlug($request->title);
        }
        $request->merge(['slug' => $slug]);
        $validated = $request->validate([
            'title' => 'required|max:190',
            'slug' => 'unique:tags,slug|max:190',
        ]);

        $tag->title = $request->title;
        $tag->slug = $slug;
        $tag->meta_desc = $request->meta_desc;
        $tag->save();
        return redirect()->back()->with('saved', 'برچسب جدید با موفقیت اضافه شد');

    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag::tags-edit', compact('tag'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $tag = Tag::findOrFail($id);
        if ($request->slug != null) {
            $slug = Helpers::makeSlug($request->slug);
        } else {
            $slug = Helpers::makeSlug($request->title);
        }
        $request->merge(['slug' => $slug]);
        $validated = $request->validate([
            'title' => 'required|max:190',
            'slug' => 'max:190|unique:tags,slug,' . $id,
        ]);

        $tag->title = $request->title;
        $tag->slug = $slug;
        $tag->meta_desc = $request->meta_desc;
        $tag->save();
        return redirect()->back()->with('saved', 'برچسب با موفقیت ویرایش شد');
    }

    public function delete($id)
    {
        $tag = Tag::findOrfail($id);
        $tag->delete();
        return response()->json(['message' => 'برچسب مورد نظر با موفقیت حذف شد!'], Response::HTTP_OK);
    }
}
