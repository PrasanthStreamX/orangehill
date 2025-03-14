<?php

namespace Modules\FoodMenu\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Modules\FoodMenu\Models\FmMenu;
use Modules\FoodMenu\Models\FmMenuCategory;
use Modules\FoodMenu\Models\FmMenuItem;
use Modules\FoodMenu\Models\FmMenuType;

class FoodMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('foodmenu::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = FmMenuType::where('active',1)->get();
        $categories = FmMenuCategory::where('active',1)->get();
        $items = FmMenuItem::where('active',1)->get();
        $menus = FmMenu::with('type','category')->get();
        $menuGroups = FmMenu::with('type','category')->groupBy('category_id','type_id')->get();
        //dd($menuGroups);
        return view('foodmenu::backend.menu.create', compact('types', 'categories', 'items', 'menus', 'menuGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'type_id' => 'required',
            'category_id' => 'required',
            'item_id' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }
        FmMenu::create([
            'type_id' => $input['type_id'],
            'category_id' => $input['category_id'],
            'item_id' => $input['item_id'],
            'active' => isset($input['active']) ? $input['active'] :  1,
        ]);
        return redirect('/admin/foodmenu/create')->with('success', 'New menu added successfully');
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
        FmMenu::where('id',$id)->delete();
        return redirect('/admin/foodmenu/create')->with('success','Menu item removed successfully');
    }
}
