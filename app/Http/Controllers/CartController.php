<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    protected  $cartService;

    public function __construct(MenuService $menu, ProductService $product, CartService $cartService)
    {
        $this->menu = $menu;
        $this->product = $product;

        $this->cartService = $cartService;

    }
    public function index()
    {
//        $carts = Cart::where('customer_id', auth('cus')->id())->get();
        return view('cart.carts',['title' => 'Cart']);
    }


    public function add(Product $product, Request $req)
    {
        $quantity = $req->qty ? floor($req->qty) : 1;
        $cus_id = auth('cus')->id();

        $cartExist = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id
        ])->first();

        if($product->quantity > 0)
        {
            if($cartExist){
                Cart::where([
                    'customer_id' => $cus_id,
                    'product_id' => $product->id
                ])->increment('qty', $quantity);
                return redirect('/carts')->with('success', 'Quantity update successful');
            }
            else
            {
                $data = [
                    'customer_id' => auth('cus')->id(),
                    'product_id' => $product->id,
                    'qty' => $quantity,
                    'price' => $product->price_sale ? $product->price_sale : $product->price
                ];
//            dd($data);
                if(Cart::create($data)){
                    return redirect('/')->with('success', 'Add product to cart successfully');
                }
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Unable to add product, please try again');
        }
        return redirect()->back()->with('error', 'Something Error');

    }

    public function delete($product_id)
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product_id
        ])->delete();
        return redirect()->back()->with('success', 'Product removal from shopping cart successful');
    }

    public function update(Product $product, Request $req)
    {
        $quantity = $req->qty ? floor($req->qty) : 1;
        $cus_id = auth('cus')->id();

        $cartExist = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id
        ])->first();

        if($cartExist){
            if($quantity < $product->quantity)
            {
                Cart::where([
                    'customer_id' => $cus_id,
                    'product_id' => $product->id
                ])->update([
                    'qty' => $quantity
                ]);
                return redirect('/carts')->with('success', 'Quantity update successful');
            }
            return redirect()->back()->with('error', 'The quantity of products exceeds the quantity of products in stock, please try again');
        }
        else
        {
            return redirect()->back()->with('error', 'Unable to update product, please try again');
        }

    }

    public function clear()
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id
        ])->delete();
        return redirect()->back()->with('success', 'Shopping cart removal successful');
    }

    public function deleteAll(Request $req)
    {
        $ids=$req->ids1;
        Cart::whereIn('id',$ids)->delete();
//        return response()->json(["success" => "Product have been deleted!"]);
        return redirect('/carts')->with('success', 'Deletion successful');
    }
}
