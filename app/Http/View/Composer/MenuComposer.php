<?php

namespace App\Http\View\Composer;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    protected $users;


    /**
     * Create a new profile composer.
     */
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view)
    {
        $menus =  Menu::select('id', 'name', 'parent_id')->where('active', 1)->orderByDesc('id')->get();

        $view->with('menus', $menus);
    }
}
