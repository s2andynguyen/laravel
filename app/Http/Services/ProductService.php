<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function create($request)
    {
        $price_sale = null;
        if ($request->input('price_sale')) {
            $price_sale = $request->input('price_sale');
        }
        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'price_sale' => $price_sale,
            'image' => $request->input('file')
        ]);
        Session::flash('success', 'Thêm sản phẩm thành công.');
    }

    public function update($request, $product)
    {
        $price_sale = null;
        if ($request->input('price_sale')) {
            $price_sale = $request->input('price_sale');
        }
        try {
            $product->name = (string) $request->input('name');
            $product->description = (string) $request->input('description');
            $product->content = (string) $request->input('content');
            $product->category_id = (string) $request->input('category_id');
            $product->price = (string) $request->input('price');
            $product->price_sale = $price_sale;
            $product->image = (string) $request->input('file');
            $product->save();
            Session::flash('success', 'Cập nhật sản phẩm thành thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
        }
    }

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $image = $product->image;
            $arr = explode('/', $image);
            $path = 'public/product-image/' . $arr[count($arr) - 1];
            Storage::delete($path);
            $product->delete();
            return true;
        }
        return false;
    }


    public function getList()
    {
        return Product::with('category')
            ->orderByDesc('id')->paginate(12);
    }

    public function getFiltertList($id)
    {
        return Product::where('category_id', $id)
            ->orderBy('id')->paginate(12);
    }
}
