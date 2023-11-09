<?php

namespace App\Http\Services;

use App\Models\Product;

class ViewProductService
{
    const LIMIT = 16;

    public function getList($request, $page = null)
    {
        $query = Product::select('id', 'name', 'price', 'price_sale', 'image');
        if ($request->input('price')) {
            $orderByPrice = $request->input('price') == 'asc' ? 'asc' : 'desc';
            $query->orderBy('price', $orderByPrice);
        }
        $query->when($page != null, function ($query) use ($page) {
            return $query->offset($page * self::LIMIT);
        })->limit(self::LIMIT);

        return $query->get();
    }

    // Lấy tất cả sản phẩm và xử lí sort
    public function getListPage($request = null)
    {
        $query = Product::select('id', 'name', 'price', 'price_sale', 'image');
        if ($request->input('price')) {
            $query->orderBy('price', $request->input('price'));
        }
        return $query->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }

    // Lấy danh sách sản phẩm theo brand và xử lí sort
    public function getListBrand($category, $request)
    {
        $query = $category->products()
            ->select('id', 'name', 'price', 'price_sale', 'image');
        if ($request->input('price')) {
            $query->orderBy('price', $request->input('price'));
        }
        return $query->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }

    //  đếm số lượng sản phẩm và hiển thị phía trên
    public function getCountProduct($category = null)
    {
        if ($category != null) {
            return $category->products()->count();
        } else {
            return Product::count();
        }
    }

    // Lấy ngẫu nhiên 4 sản phẩm 
    public function getRalated($product_id)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'image')
            ->where('id', '!=', $product_id)
            ->inRandomOrder()
            ->limit(4)->get();
    }
}
