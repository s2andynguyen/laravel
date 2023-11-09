<?php

namespace App\Lib;

use App\Models\Menu;

class HelperMenu
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
    
    public static function getMenu()
    {
        $menus = Menu::where('parent_id', 0)->get();
        $main_menu = "";
        $menuchild = "";
        foreach ($menus as $menu) {
            $slug = $menu->slug;
            $menu_name = $menu->name;
            $menuchild = self::getChild($menu->id);
            if ($menuchild != '') {
                $main_menu .= "
                    <li>
                        <a href='$slug'>$menu_name</a>
                        <ul class='header__menu__dropdown'>
                            $menuchild
                        </ul>
                    </li>
                ";
            } else {
                $main_menu .= "<li><a href='$slug'>$menu_name</a></li>";
            }
        }
        return $main_menu;
    }
}
