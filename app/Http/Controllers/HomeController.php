<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\CategoryService;
use App\Http\Services\ViewProductService;

class HomeController extends Controller
{
    protected $viewproduct;
    protected $categoryService;
    public function __construct(ViewProductService $viewproduct, CategoryService $categoryService)
    {
        $this->viewproduct = $viewproduct;
        $this->categoryService = $categoryService;
    }

    public function checkAuth()
    {
        if (Auth::check()) {
            return true;
        } else return false;
    }

    public function index(Request $request)
    {
        return view('fontend.home', [
            'title' => 'Shop Nước Hoa-TUN Luxury',
            'products' => $this->viewproduct->getList($request)
        ]);
    }
    public function shop(Request $request)
    {
        return view('product.shop', [
            'title' => "Cửa hàng",
            'count' => $this->viewproduct->getCountProduct(),
            'products' => $this->viewproduct->getListPage($request)
        ]);
    }

    public function shopbrand(Request $request, $category)
    {
        $category = $this->categoryService->getBySlug($category);
        $product = $this->viewproduct->getListBrand($category, $request);

        if (isset($category)) {
            return view('product.shop', [
                'title' => $category->name,
                'count' => $this->viewproduct->getCountProduct($category),
                'products' => $product
            ]);
        }
    }
    // Trang chi tiết sản phẩm
    public function productDetail(Product $product)
    {
        return view('product.shopdetail', [
            'title' => "Chi tiết sản phẩm",
            'product' => $product,
            'related' => $this->viewproduct->getRalated($product->id)
        ]);
    }

    // xử lí tải thêm
    public function loadMore(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->viewproduct->getList($request, $page);
        if (count($result) > 0) {
            $html = view('product.productlist', ['products' => $result])->render();
            return response()->json([
                'html' => $html
            ]);
        }
        return response()->json(['html' => '']);
    }

    public function blog()
    {
        return view('fontend.blog', ['title' => 'Blog']);
    }

    public function content()
    {
        return view('fontend.postcontent', ['title' => 'Trang bài viết']);
    }

    public function contact()
    {
        return view('fontend.contact', ['title' => 'Contact Page']);
    }

    public function checkout()
    {
        $cart = request()->session()->get('cart');
        if (count($cart) > 0) {
            return view('fontend.checkout', [
                'title' => 'Trang thanh toán',
                'cart' => $cart
            ]);
        } else {
            return redirect()->back();
        }
    }
}
