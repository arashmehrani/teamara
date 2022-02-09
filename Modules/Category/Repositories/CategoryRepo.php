<?php

namespace Modules\Category\Repositories;


use Modules\Category\Entities\Category;

class CategoryRepo
{
    public function categories()
    {
        return Category::with('childrenRecursive')
            ->where('parent_id', null)
            ->where('type', null)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function categoriesSearch($value)
    {
        return Category::where('type', null)
            ->where('title', 'like', '%' . $value . '%')
            ->orWhere('slug', 'like', '%' . $value . '%')
            ->orWhere('meta_desc', 'like', '%' . $value . '%')
            ->orderBy('created_at', 'desc')->paginate(10);
    }

    public function categoryParents()
    {
        return Category::with('childrenRecursive')
            ->where('parent_id', null)
            ->where('type', null)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function categoryParentsExcept($id)
    {
        return Category::with('childrenRecursive')
            ->where('parent_id', null)
            ->where('type', null)
            ->where('id', '!=', $id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
