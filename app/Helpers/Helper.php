<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class Helper
{
    public static function menu($menus,$parent=0, $char = '')
    {
        $html='';

        foreach ($menus as $key => $menu)
        {
                if($menu->parent_id == $parent)
                {
                    $html .= '
                    <tr class="text-center" id="menu_ids'.$menu->id.'">
                         <td><input type="checkbox" name="ids3" class="checkbox_ids" value="'. $menu->id.'"></td>
                         <td>'. $menu->id.'</td>
                         <td>'. $char . $menu->name.'</td>
                         <td>'. self::active($menu->active).'</td>
                         <td>'. $menu->updated_at.'</td>

                         <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $menu->id . ', \'/admin/menus/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';

                    unset($menus[$key]);

                    $html .= self::menu($menus, $menu->id, $char .'--');
                }
        }
        return $html;
    }

    public static function active($active = 0) :string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>' :
            '<span class="btn btn-success btn-xs">YES</span>' ;
    }

    public static function menus($menus, $parent_id = 0)
    {
        $html = '';

        foreach ($menus as $key => $menu)
        {
            if($menu->parent_id == $parent_id){
                $html .= '
                    <li class="nav-item dropdown">
                        <a class="nav-link"  href="/danh-muc/' . $menu->id. '-' .Str::slug($menu->name, '-'). '.html">
                            '.$menu->name.'
                        </a>';

                    unset($menus[$key]);

                    if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="dropdown-menu m-0">';
                    $html .= self::menus($menus, $menu->id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }
        return $html;
    }

    public static function isChild($menus, $id) : bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }

}
