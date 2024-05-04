<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;
    protected $menu;
    public function __construct(MenuService $menuService, MenuService $menu)
    {
        $this->menuService = $menuService;
        $this->menu = $menu;
    }

    public function index(Request $request, $id, $slug = '')
    {
        $menu = $this->menuService->getId($id);


//        dd($menu);
        $products = $this->menuService->getProduct($menu);
//        dd($products);
        return view('menu',[
            'title' => $menu->name,
            'products' => $products,
            'menu' => $menu,
            'menus' => $this->menu->show()
        ]);
    }
}
