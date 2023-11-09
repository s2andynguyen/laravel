<?php

namespace App\Lib;

use Illuminate\Support\Facades\Auth;
use App\Lib\HelperProduct;

class Helper
{
    public static function getUserInfo()
    {
        $result = [];
        if (Auth::check()) {
            $result = [
                'username' => auth()->user()->name,
                'email' => auth()->user()->email,
                'level' => auth()->user()->level
            ];
            return $result;
        } else return false;
    }


    public static function getCategory($category, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($category as $key => $cate) {
            if ($cate->parent_id == $parent_id) {
                $html .= '
                    <tr>
                        <td>' . $cate->id . '</td>
                        <td>' . $char . $cate->name . '</td>
                        <td>' . $cate->description . '</td>
                        <td>' . $cate->slug . '</td>
                        <td>' . $cate->updated_at . '</td>
                        <td>
                            <a href="/admin/category/edit/' . $cate->id . '" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="handleRemove(' . $cate->id . ', \'/admin/category/destroy\' )">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';
                unset($cate[$key]);
                $html .= self::getCategory($category, $cate->id, '-->');
            }
        }
        return $html;
    }

    public static function mainCategory($category, $parent_id = 0)
    {
        $html = '';
        foreach ($category as $key => $cate) {
            // đếm số lượng sản phẩm
            $count = HelperProduct::countQuantity($cate->id);
            if ($cate->parent_id == $parent_id) {
                $html .= " 
                    <li><a href='/shop/band/$cate->slug'>$cate->name<span>   ($count)</span></a></li>
                ";
                unset($cate[$key]);
                $html .= self::mainCategory($category, $cate->id);
            }
        }
        return $html;
    }

    public static function formatCurrency($amount)
    {
        return number_format($amount, 0, '.', ',') . 'đ';
    }

    public static function salePercent($price, $price_sale)
    {
        $result = 0;
        if (!empty($price_sale)) {
            $result = ($price - $price_sale) / $price;
            return round($result * 100);
        }
    }
}
