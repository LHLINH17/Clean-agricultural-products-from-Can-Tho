<?php

namespace App\Http\Services\Product;
use App\Models\Product;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'The reduced price must be less than the original price');
//            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Please enter the original price of the product');
//            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        try {
            $request->except('_token');
            Product::create($request->all());
//            Session::flash('success', 'Thêm Sản phẩm thành công');
            Session::flash('success', 'Create a successful product');
        } catch (\Exception $err) {
//            Session::flash('error', 'Thêm Sản phẩm lỗi');
            Session::flash('error', 'Unable to create the product, please try again');
            \Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }
    public function get($key)
    {
        $key = request()->key;
        if($key != ''){
            return Product::with('menu')
                ->orderByDesc('id')
                ->where('name','like','%'.$key.'%')
                ->paginate(8);
        }
        return Product::with('menu')
            ->orderByDesc('id')
            ->paginate(8);
    }

    public function update($request, $product)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Product update successfully');
        } catch (\Exception $err) {
            Session::flash('error', 'Unable update product, please try again');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
