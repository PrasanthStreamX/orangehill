<?php

namespace Modules\FoodMenu\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
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
    public function create(Request $request, $id = null)
    {
        if(!$id){
            return redirect()->route('foodmenu.type.index');
        }
        $type = FmMenuType::where('id',$id)->first();
        $categories = FmMenuCategory::where('active',1)->get();
        $menus = FmMenu::with('item','type','category')->orderBy('weight', 'asc')->get();
        $menuGroups = FmMenu::with('type','category')->groupBy('category_id','type_id')->get();
        return view('foodmenu::backend.menu.create', compact('type', 'categories', 'menus', 'menuGroups'));
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
        $item_id = $input['item_id'];
        DB::beginTransaction();
        foreach($input['item_id'] as $item_id){
            $item = FmMenuItem::where('id', $item_id)->with('prices')->first();
            FmMenu::create([
                'type_id' => $input['type_id'],
                'category_id' => $input['category_id'],
                'item_id' => $item->id,
                'weight' => $item->weight,
            ]);
        }
        DB::commit();
        return redirect('/admin/foodmenu/create/'.$input['type_id'])->with('success', 'New menu added successfully');
        
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
    public function updateOrder(Request $request)
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
        foreach($input['item_id'] as $key => $item){
            FmMenu::where([
                'type_id'=> $input['type_id'],
                'category_id' => $input['category_id'][$key],
                'item_id' => $item
            ])->update([
                'weight' => $key
            ]);
        }

        return Response::json(['success' => true], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,$type)
    {
        FmMenu::where('id',$id)->delete();
        return redirect('/admin/foodmenu/create/'.$type)->with('success','Menu item removed successfully');
    }
}
