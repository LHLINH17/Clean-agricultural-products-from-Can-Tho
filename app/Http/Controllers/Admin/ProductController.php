<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Services\Product\ProductAdminService;
//use App\Http\Services\Product\ProductService;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService){
        $this->productService=$productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $key)
    {
        return view('admin.product.list', [
            'title' => 'Product List',
            'products' => $this->productService->get($key)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Add New Product',
            'menus' => $this->productService->getMenu()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit($id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect('/admin/products/list');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Product deletion was successful'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

    public function deleteAll(Request $req)
    {
        $ids=$req->ids;
        Product::whereIn('id',$ids)->delete();
        return response()->json(["success" => "Product have been deleted!"]);
    }
}
