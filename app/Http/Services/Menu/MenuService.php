<?php
namespace App\Http\Services\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Menu;
class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id',0)->get();
    }

    public function getAll($key)
    {
//        then Desc sau orderBy de sap tang dan
        $key = request()->key;
        if($key == '')
        {
            return Menu::orderBy('id')->paginate(4);
        }
        return Menu::orderby('id')
            ->where('name', 'like', '%'.$key.'%')
            ->paginate(4);
    }

    public function show()
    {
        return Menu::select('name', 'id')
            ->where('parent_id', 0)
            ->get();
    }

    public function create($request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        try {
            Menu::create([
                'name' => (string) $request -> input('name'),
                'parent_id' => (int) $request -> input('parent_id'),
                'description' => (string) $request -> input('description'),
                'content' => (string) $request -> input('content'),
                'active' => (string) $request -> input('active'),
//                'slug' => Str::slug($request -> input('name'),'-')
            ]);

            Session::flash('success', 'Create a successful category !');
        }
        catch (\Exception $err)
        {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $menu): bool
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if ($request->input('parent_id') != $menu->id) {
            $menu->parent_id = (int)$request->input('parent_id');
        }

        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (string) $request->input('active');
        $menu->save();

        Session::flash('success', 'Category update successfully!');
        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');

//        $menu = Menu::where('id', $id->first());
        $menu = Menu::where('id', $id)->first();

        if($menu){
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }

    public function getId($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProduct($menu)
    {
        return $menu->products()
            ->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->orderByDesc('id')
            ->paginate(4);
    }
}

