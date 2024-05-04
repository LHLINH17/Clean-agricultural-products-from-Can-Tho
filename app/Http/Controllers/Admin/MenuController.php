<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService=$menuService;
    }

    public function index(Request $key)
    {
        return view('admin.menu.list',[
            'title' => 'Category List',
            'menus' => $this->menuService->getAll($key)
        ]);
    }

    public function create()
    {
        return view('admin.menu.add',[
            'title' => "Add new category",
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
//        dd($request->input());

//        $result = $this->menuService->create($request);
        $this->menuService->create($request);
        return redirect()->back();
    }



    public function show(Menu $menu)
    {
        return view('admin.menu.edit',[
            'title' => 'Edit category' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->menuService->update($request, $menu);

        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request) : JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Category deleted successfully'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function deleteAll(Request $req)
    {
        $ids=$req->ids3;
        Menu::whereIn('id',$ids)->delete();
        return response()->json(["success" => "Menu have been deleted!"]);
    }
}
