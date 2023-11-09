<?php

namespace App\Http\Services;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CategoryService
{
    public function getAll()
    {
        return Category::orderBy('id')->get();
    }

    public function getParent()
    {
        return Category::where('parent_id', 0)->get();
    }

    public function getBySlug($slug)
    {
        return Category::where('slug', $slug)->first();
    }

    public function create($request)
    {
        try {
            Category::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'slug' => Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success', 'Thêm danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $cate = Category::where('id', $id)->first();
        $product = Product::where('category_id', $id)->first();
        if ($cate && !$product) {
            return Category::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function update($request, $category)
    {
        if ($request->input('parent_id') != $category->id) {
            $category->name = (string) $request->input('name');
            $category->parent_id = (int) $request->input('parent_id');
            $category->description = (string) $request->input('description');
            $category->content = (string) $request->input('content');
            $category->slug = Str::slug($request->input('name'), '-');
            $category->save();
            Session::flash('success', 'Cập nhật thành thành công');
            return true;
        } else {
            Session::flash('error', 'Không thể chọn chính danh mục hiện tại làm danh mục cha!');
        }
    }
}
