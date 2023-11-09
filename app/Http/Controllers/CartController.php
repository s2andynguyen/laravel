<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product_id = $request->input('product-id');
        $product = Product::find($product_id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        $cart = $request->session()->get('cart', []);
        $countCart = $request->session()->get('countCart');
        if (array_key_exists($product_id, $cart)) {
            $cart[$product_id]['quantity'] += $request->input('product-quantity');
        } else {
            $cart[$product_id] = [
                'product' => $product,
                'quantity' => $request->input('product-quantity'),
            ];
            $countCart++;
        }
        $request->session()->put('cart', $cart);
        $request->session()->put('countCart', $countCart);
        return redirect('/cart')->with('success', 'Product added to cart.');
    }

    public function showCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $total = 0;
        foreach ($cart as $key => $item) {
            if (isset($item['product']->price_sale)) {
                $total += $item['product']->price_sale * $item['quantity'];
            } else {
                $total += $item['product']->price * $item['quantity'];
            }
        }
        return view('fontend.cart', [
            'title' => 'Giỏ hàng',
            'cart' => $cart,
            'total' => $total
        ]);
    }
    public function update(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        foreach ($cart as $product_id => $item) {
            $qty = $request->input("quantity-product-$product_id");
            $cart[$product_id]['quantity'] = $qty;
        }
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeCart(Request $request)
    {
        $product_id = $request->input('id');
        $cart = $request->session()->get('cart', []);
        $countCart = $request->session()->get('countCart');
        $result = false;
        if (array_key_exists($product_id, $cart)) {
            unset($cart[$product_id]);
            $countCart--;
            $result = true;
        }
        $request->session()->put('cart', $cart);
        $request->session()->put('countCart', $countCart);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa thất bại!'
        ]);
    }
}
