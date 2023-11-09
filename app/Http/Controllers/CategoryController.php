<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    // trang list danh mục
    public function index()
    {
        return view('admin.category.list', [
            'title' => 'Danh sách Danh mục',
            'category' => $this->categoryService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.category.add', [
            'title' => 'Thêm danh mục sản phẩm',
            'category' => $this->categoryService->getParent()
        ]);
    }

    public function store(CategoryCreateRequest $request)
    {
        $this->categoryService->create($request);
        return redirect()->back();
    }

    public function show(Category $category)
    {
        return view('admin.category.edit', [
            'title' => 'Chỉnh sửa danh mục ' . $category->name,
            'category' => $this->categoryService->getParent(),
            'categoryItem' => $category
        ]);
    }

    public function update(Category $category, CategoryCreateRequest $request)
    {
        $this->categoryService->update($request, $category);
        return redirect('/admin/category/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->categoryService->destroy($request);
        if ($result) {
            Session::flash('success', 'Xóa thành công');
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Danh mục chứa sản phẩm không thể xóa'
        ]);
    }
}
