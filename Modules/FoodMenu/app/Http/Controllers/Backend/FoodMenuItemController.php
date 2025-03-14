<?php

namespace Modules\FoodMenu\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Modules\FoodMenu\Models\FmMenuItem;
use Modules\FoodMenu\Models\FmMenuCategory;
use Modules\FoodMenu\Models\FmMenuType;

class FoodMenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = FmMenuItem::orderBy('weight','asc')->get();
        return view('foodmenu::backend.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = FmMenuType::where('active', 1)->get();
        $categories = FmMenuCategory::where('active',1)->get();
        return view('foodmenu::backend.item.create', compact('types','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }

        $item = FmMenuItem::create([
            'title' => $input['title'],
            'info' => $input['info'],
            'description' => $input['description'],
            'price' => $input['price'],
            'note' => $input['note'],
            'weight' => isset($input['weight']) ? $input['weight'] : 0,
            'active' => isset($input['active']) ? $input['active'] :  1,
        ]);
        if($request->thumb){
            $thumb = 'fm_item_thumb_'.$item->id.'_'.time().'.'.$request->thumb->extension(); 
            $request->thumb->storeAs('/images', $thumb, ['disk' => 'public']);
        }
        if($request->cover_photo){
            $cover_photo = 'fm_item_cover_'.$item->id.'_'.time().'.'.$request->cover_photo->extension(); 
            $request->cover_photo->storeAs('/images', $cover_photo, ['disk' => 'public']);
        }
        FmMenuItem::where('id', $item->id)->update([
            'thumb' => $request->thumb ? $thumb : null,
            'cover_photo' => $request->cover_photo ? $cover_photo : null,
        ]);

        return redirect('/admin/foodmenu/item/'.$item->id)->with('success', 'New menu added successfully');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $item = FmMenuItem::where('id',$id)->first();
        if(!$item){
            return redirect('/admin/foodmenu/item')->with('error', 'The requested item does not found.');
        }
        return view('foodmenu::backend.item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = FmMenuItem::where('id',$id)->first();
        return view('foodmenu::backend.item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = FmMenuItem::where('id',$id)->first();
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }

        FmMenuItem::where('id', $item->id)->update([
            'title' => $input['title'],
            'info' => $input['info'],
            'description' => $input['description'],
            'price' => $input['price'],
            'note' => $input['note'],
            'weight' => $input['weight'],
            'active' => isset($input['active']) ?? $item->active
        ]);

        if($request->thumb){
            $existing_thumb = $item->thumb;
            if($existing_thumb){
                Storage::delete('public/images/'.$existing_thumb);
            }
            $thumb = 'fm_item_thumb_'.$item->id.'_'.time().'.'.$request->thumb->extension(); 
            $request->thumb->storeAs('/images', $thumb, ['disk' => 'public']);
            FmMenuItem::where('id', $item->id)->update([
                'thumb' => $thumb,
            ]);
        }
        if($request->cover_photo){
            $existing_cover_photo = $item->cover_photo;
            if($existing_cover_photo){
                Storage::delete('public/images/'.$existing_cover_photo);
            }
            $cover_photo = 'fm_item_cover_'.$item->id.'_'.time().'.'.$request->cover_photo->extension(); 
            $request->cover_photo->storeAs('/images', $cover_photo, ['disk' => 'public']);
            FmMenuItem::where('id', $item->id)->update([
                'cover_photo' => $cover_photo,
            ]);
        }
        return redirect('/admin/foodmenu/item/'.$item->id)->with('success', 'Menu updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = FmMenuItem::where('id',$id)->first();
        if($item->thumb){
            Storage::delete('public/images/'.$item->thumb);
        }
        if($item->cover_photo){
            Storage::delete('public/images/'.$item->cover_photo);
        }
        $item->delete();
        return redirect('/admin/foodmenu/item')->with('success','Menu item deleted successfully');
    }
}
