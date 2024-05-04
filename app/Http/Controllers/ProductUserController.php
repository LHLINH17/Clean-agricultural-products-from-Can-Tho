<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class   ProductUserController extends Controller
{
    protected $slider;
    protected $menu;
    protected $productService;


    public function __construct(MenuService $menu, ProductService $productService)
    {
        $this->menu = $menu;
        $this->productService = $productService;

    }

    public function index()
    {
        return view('product', [
            'title' => 'Product',
            'menus' => $this->menu->show(),
            'products' => $this->productService->get(),
        ]);
    }

    public function searchProduct(Request $key)
    {
        $key = request()->key;
        $products = $this->productService->searchProduct($key);
        return view('product',[
            'title' => 'Category ',
            'products' => $products,
            'menus' => $this->menu->getParent()
        ]);
    }
}
