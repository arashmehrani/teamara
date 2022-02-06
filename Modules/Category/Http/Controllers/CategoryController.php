<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helpers;
use Modules\Category\Entities\Category;
use Modules\Category\Repositories\CategoryRepo;

class CategoryController extends Controller
{
    public $repo;

    public function __construct(CategoryRepo $categoryRepo)
    {
        $this->repo = $categoryRepo;
    }

    public function index(Request $request)
    {
        $categories = $this->repo->categories();

        if ($request->get('search')) {
            $search = $request->get('search');
            $categories = $this->repo->categoriesSearch($search);
        }
        $category_parents = $this->repo->categoryParents();

        return view('category::categories', compact('categories', 'category_parents'));
    }

    public function new(Request $request, Category $category)
    {
        if ($request->slug != null) {
            $slug = Helpers::makeSlug($request->slug);
        } else {
            $slug = Helpers::makeSlug($request->title);
        }
        $request->merge(['slug' => $slug]);
        $validated = $request->validate([
            'title' => 'required|max:190',
            'slug' => 'unique:categories,slug|max:190',
            'parent_id' => 'nullable|numeric',
        ]);
        $category->title = $request->title;
        if ($request->parent_id == '0' or $request->parent_id == null) {
            $category->parent_id = null;
        } else {
            $category->parent_id = $request->parent_id;
        }
        $category->meta_desc = $request->meta_desc;
        $category->slug = $slug;
        $category->save();
        return redirect()->back()->with('saved', 'دسته جدید با موفقیت اضافه شد');

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $category_parents = $this->repo->categoryParentsExcept($id);
        return view('category::categories-edit', compact('category_parents', 'category'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        if ($request->slug != null) {
            $slug = Helpers::makeSlug($request->slug);
        } else {
            $slug = Helpers::makeSlug($request->title);
        }
        $request->merge(['slug' => $slug]);
        $validated = $request->validate([
            'title' => 'required|max:190',
            'slug' => 'max:190|unique:categories,slug,' . $id,
            'parent_id' => 'nullable|numeric',
        ]);

        $category->title = $request->title;
        if ($request->parent_id == '0' or $request->parent_id == null) {
            $category->parent_id = null;
        } elseif ($request->parent_id == $category->id) {
            $category->parent_id = null;
        } elseif ($request->parent_id == $category->parent_id) {
            $category->parent_id = $request->parent_id;
        } else {
            $category->parent_id = $request->parent_id;
            $subs = Category::where('parent_id', $category->id)->get();
            foreach ($subs as $sub) {
                $sub->parent_id = null;
                $sub->save();
            }
        }
        $category->meta_desc = $request->meta_desc;
        $category->slug = $slug;
        $category->save();
        return redirect()->back()->with('saved', 'دسته با موفقیت ویرایش شد');

    }

    public function delete($id)
    {
        $category = Category::findOrfail($id);
        $category->delete();
        return response()->json(['message' => 'دسته مورد نظر با موفقیت حذف شد!'], Response::HTTP_OK);
    }
}
