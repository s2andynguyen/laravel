<?php

namespace App\Lib;

use App\Models\Menu;
use App\Models\Product;
use App\Models\Category;

class HelperProduct
{
    public static function getChild($id)
    {
        $menus = Menu::where('parent_id', $id)->get();
        $htmls = '';
        foreach ($menus as $menu) {
            $slug = $menu->slug;
            $menu_name = $menu->name;
            $htmls .= "<li><a href='$slug'>$menu_name</a></li>";
        }
        return $htmls;
    }

    public static function getLatest($count)
    {
        return Product::with('category')->latest('created_at')->take($count)->get();
    }
    
    public static function getPremium($count)
    {
        return Product::orderBy('price', 'desc')->take($count)->get();
    }

    public static function getPopular($count)
    {
        return Product::orderBy('price', 'asc')->offset(10)->take($count)->get();
    }

    public static function getSlide()
    {
        $categories = Category::with('products')->get();
        $selected = collect();
        foreach ($categories as $category) {
            if ($category->products->count()) {
                $product = $category->products->random();
                $selected->push($product);
            } else {
                continue;
            }
        }
        return $selected;
    }

    public static function countQuantity($category_id)
    {
        return Product::where('category_id', $category_id)->count();
    }


    public static function getCountCart()
    {
        $count = request()->session()->get('countCart');
        return $count;
    }

    public static function getTotalCart()
    {
        $cart = request()->session()->get('cart');
        $total = 0;
        if (isset($cart)) {
            foreach ($cart as $key => $item) {
                if (isset($item['product']->price_sale)) {
                    $total += $item['product']->price_sale * $item['quantity'];
                } else {
                    $total += $item['product']->price * $item['quantity'];
                }
            }
        }
        return $total;
    }
}
