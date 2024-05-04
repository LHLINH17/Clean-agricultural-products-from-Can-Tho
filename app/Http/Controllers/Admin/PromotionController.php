<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Promotion\PromotionAdminService;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected $promotionAdminService;
    public function __construct(PromotionAdminService $promotionAdminService)
    {
        $this->promotionAdminService = $promotionAdminService;
    }
    public function index(Request $key)
    {
        $promotion = $this->promotionAdminService->get($key);
        return view('admin.promotion.list', [
            'title' => 'Promotion Page',
            'promotions' => $promotion
        ]);
    }

    public function show(Promotion $promotion)
    {
        return view('admin.promotion.edit', [
            'title'=>'Promotion edit: ' . $promotion->name,
            'promotions'=>$promotion,
        ]);
    }

    public function update(Request $request, Promotion $promotion)
    {
        $this->promotionAdminService->update($request, $promotion);
        return redirect('/admin/promotion/list');
    }

    public function create()
    {
        return view('admin.promotion.add',[
            'title' => 'Promotion Add'
        ]);
    }

    public function store(Request $request)
    {
        $this->promotionAdminService->promotionAdd($request);
        return redirect()->route('index_promotion');
    }

    public function destroy(Request $request)
    {
        $result = $this->promotionAdminService->destroy($request);
        if($result)
        {
            return response()->json([
                'error' => false,
                'message' => 'Promotion deleted successfully'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
