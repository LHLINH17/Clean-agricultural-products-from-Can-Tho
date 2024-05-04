<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(MenuService $menu, ProductService $product)
    {
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index()
    {
        return view('main', [
            'title' => 'Nông sản Cần Thơ',
            'menus' => $this->menu->show(),
            'products' => $this->product->get()
        ]);
    }
}
