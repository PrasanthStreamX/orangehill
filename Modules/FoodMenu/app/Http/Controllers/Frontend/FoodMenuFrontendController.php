<?php

namespace Modules\FoodMenu\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\FoodMenu\Models\FmMenu;
use Modules\FoodMenu\Models\FmMenuCategory;
use Modules\FoodMenu\Models\FmMenuType;
use Modules\FoodMenu\Models\FmMenuTypeHasModel;

class FoodMenuFrontendController extends Controller
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
        return view('foodmenu::frontend.index',compact('pageFace','types', 'categories' ,'menus','menuGroups'));
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
        $type = FmMenuType::where('id',$id)->first();
        $pageFace = [
            'page_title' => $type->title
        ];
        $menus = FmMenu::where('type_id',$id)->with('item','type','category')->orderBy('weight', 'asc')->get();
        $menuGroups = FmMenu::where('type_id',$id)->with('category')->groupBy('category_id')->get();
        return view('foodmenu::frontend.show', compact('menus', 'menuGroups','pageFace'));
    }

    /**
     * Show the specified resource with model id.
     */
    public function showModelMenu($id)
    {
        $model = FmMenuTypeHasModel::where('id',$id)->with('type')->first();
        return $this->show($model->type->id);
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
