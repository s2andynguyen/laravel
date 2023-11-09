<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProductService;
use App\Http\Services\CategoryService;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;

class ProductController extends Controller
{
    protected $categoryService;
    protected $productService;

    public function __construct(
        CategoryService $categoryService,
        ProductService $productService
    ) {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    // show trang detail
    public function detail()
    {
        return view('product.shopdetails', ['title' => 'Shop Detail']);
    }

    // admin product list
    public function list()
    {
        return view('admin.product.list', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->getList(),
            'category' => $this->categoryService->getAll()
        ]);
    }
    
    public function adminFilter($category)
    {
        return view('admin.product.list', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->getFiltertList($category),
            'category' => $this->categoryService->getAll(),
            'current_cate' => $category
        ]);
    }

    // admin page create product
    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Thêm sản phẩm',
            'category' => $this->categoryService->getAll()
        ]);
    }

    // admin store product
    public function store(ProductCreateRequest $request)
    {
        $this->productService->create($request);
        return redirect()->back();
    }


    public function show(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Chỉnh sửa sản phẩm',
            'category' => $this->categoryService->getAll(),
            'product' => $product
        ]);
    }

    public function update(Product $product, ProductCreateRequest $request)
    {
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect('/admin/product/list');
        } else {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }
        return response()->json(['error' => true]);
    }
}
