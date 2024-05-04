<?php

namespace App\Http\Services\Promotion;


use App\Models\Promotion;
use Illuminate\Support\Facades\Session;

class PromotionAdminService
{
    public function get($key)
    {
        $key = request()->key;
        if($key != ''){
            return Promotion::orderbyDesc('id')
                ->where('name', 'like', '%'.$key.'%')
                ->paginate(1);
        }
        return Promotion::orderbyDesc('id')->paginate(10);
    }
    public function update($request, $promotion)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        try {
            $promotion->name = (string)$request->input('name');
            $promotion->start_time = (date('Y-m-d',strtotime($request->input('start_time'))));
            $promotion->expired_time = (date('Y-m-d',strtotime($request->input('expired_time'))));
            $promotion->promotion_percent = (integer)$request->input('promotion_percent');
            $promotion->promotion_quantity = (integer)$request->input('quantity');
            $promotion->active = (string)$request->input('active');
            $promotion->save();
            Session::flash('success', 'Promotion update successfully!');
        } catch (\Exception $err) {
            Session::flash('error', 'Unable promotion update');
            return false;
        }
        return true;
    }

    public function promotionAdd($request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        try{
            Promotion::create([
                'name' => (string)$request->input('name'),
                'start_time' => (date('Y-m-d',strtotime($request->input('start_time')))),
                'expired_time' => (date('Y-m-d',strtotime($request->input('expired_time')))),
                'promotion_percent' => (integer)$request->input('promotion_percent'),
                'promotion_quantity' => (integer)$request->input('quantity'),
                'active' => (string) $request -> input('active'),
            ]);
            Session::flash('success', 'Promotion add successfully');
        } catch (\Exception $err){
            Session::flash('error', $err->getMessage());
            return redirect()->route('create_promotion');
        }
        return redirect()->route('index_promotion');
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $promotion = Promotion::where ('id', $id)->first();
        if($promotion){
            return Promotion::where('id', $id)->delete();
        }
        return  false;
    }
}
