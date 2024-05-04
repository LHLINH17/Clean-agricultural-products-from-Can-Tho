<?php

namespace App\Http\Controllers;

use App\Http\Services\Comment\CommentUserService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Order\OrderUserService;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    protected $menuUserService;
    protected $productService;

    protected $commentUserService;

    protected $orderUserService;

    public function __construct(MenuService $menuUserService, ProductService $productService, CommentUserService $commentUserService, OrderUserService $orderUserService)
    {
        $this->menuUserService = $menuUserService;

        $this->productService = $productService;

        $this->commentUserService = $commentUserService;

        $this->orderUserService = $orderUserService;
    }

    public function index($id = '', $slug = '')
    {
        $cus = auth('cus')->id();
        $menuID = $this->productService->getMenuID($id);
        $product = $this->productService->show($id);
        $productMore = $this->productService->more($menuID, $id);
        $comments = $this->commentUserService->getComment($id);

        $product_id = $this->orderUserService->getProductID($id);
        $customer_id = $this->orderUserService->getCustomerID($cus);
//        dd($product_id);

        return view('product.productDetail',[
            'title' => $product->name,
            'products' => $product,
            'productMore' => $productMore,
            'comments' => $comments,
            'product_id' => $product_id,
            'customer_id' => $customer_id,
        ]);
    }


}
