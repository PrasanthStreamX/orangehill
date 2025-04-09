<?php

namespace Modules\FoodMenu\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\FoodMenu\Models\FmMenu;
use Modules\FoodMenu\Models\FmMenuCategory;
use Modules\FoodMenu\Models\FmMenuType;

class FEfoodMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $pageFace['page_title'] = 'Menu';
        $types = FmMenuType::where('active',1)->where('in_menu',1)->orderBy('weight', 'asc')->get();
        $categories = FmMenuCategory::where('active',1)->get();
        $menus = FmMenu::with('item','type','category')->orderBy('weight', 'asc')->get();
        $menuGroups = FmMenu::with('type','category')->groupBy('category_id','type_id')->get();
        return view('foodmenu::frontend.list',compact('pageFace','types', 'categories' ,'menus','menuGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('foodmenu::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('foodmenu::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('foodmenu::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
