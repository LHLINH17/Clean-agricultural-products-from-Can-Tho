<?php

namespace App\Http\Services\Product;
use App\Models\Product;
use App\Models\Menu;
class ProductService
{
    const LIMIT = 8;

    public function get($page = null)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->orderbyDesc('id')
            ->paginate(8);
//            ->orderByDesc('id')
//            ->limit(self::LIMIT)
//            ->get();
    }

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }

    public function more($menuID, $id)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->where('menu_id', $menuID)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }

    public function searchProduct($key)
    {
        $key = request()->key;
        if($key != ''){
            return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                ->where('active', 1)
                ->where('name' ,'like', '%'.$key.'%')
                ->orderbyDesc('id')
                ->paginate(8);
        }
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->orderByDesc('id')
            ->paginate(8);
    }

    public function getMenuID($id)
    {
        return $menuID = Product::select('menu_id')->where('id', $id);
    }
}
