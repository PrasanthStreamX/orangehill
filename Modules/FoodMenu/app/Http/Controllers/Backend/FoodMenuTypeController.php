<?php

namespace Modules\FoodMenu\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Modules\FoodMenu\Models\FmMenuType;
use Modules\FoodMenu\Models\FmMenuTypeHasModel;

class FoodMenuTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = FmMenuType::orderBy('weight', 'asc')->get();
        return view('foodmenu::backend.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('foodmenu::backend.type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }

        $type = FmMenuType::create([
            'type' => $input['type'],
            'title' => $input['title'],
            'info' => isset($input['info']) ? $input['info'] : null,
            'description' => isset($input['description']) ? $input['description'] : null,
            'note' => isset($input['note']) ? $input['note'] : null,
            'price_full' => isset($input['price_full']) ? $input['price_full'] : '0.00',
            'price_half' => isset($input['price_half']) ? $input['price_half'] : '0.00',
            'weight' => isset($input['weight']) ? $input['weight'] : 0,
            'active' => isset($input['active']) ? $input['active'] : 0,
            'in_menu' => isset($input['in_menu']) ? $input['in_menu'] : 0,
        ]);

        if($request->thumb){
            if($request->hasFile('thumb')){
                $thumb = 'fm_type_thumb_'.$type->id.'_'.time().'.'.$request->thumb->extension(); 
                $request->thumb->storeAs('/images', $thumb, ['disk' => 'public']);
            }else{
                $thumb = $input['thumb'];
            }
        }
        if($request->cover_photo){
            $cover_photo = 'fm_type_cover_'.$type->id.'_'.time().'.'.$request->cover_photo->extension(); 
            $request->cover_photo->storeAs('/images', $cover_photo, ['disk' => 'public']);
        }
        FmMenuType::where('id', $type->id)->update([
            'thumb' => $request->thumb ? $thumb : null,
            'cover_photo' => $request->cover_photo ? $cover_photo : null,
        ]);

        if(isset($input['model_type'])){
            FmMenuTypeHasModel::create([
                'type_id' => $type->id,
                'model_type' => $input['model_type'],
                'label' => $input['model_label'],
                'model_id' => $input['model_id']
            ]);
        }

        return redirect('/admin/foodmenu/create/'.$type->id)->with('success', 'New menu added successfully');

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $type = FmMenuType::where('id',$id)->first();
        if(!$type){
            return redirect('/admin/foodmenu/type')->with('error', 'The requested type does not found.');
        }
        return view('foodmenu::backend.type.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $type = FmMenuType::where('id',$id)->first();
        return view('foodmenu::backend.type.edit' , compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $type = FmMenuType::where('id',$id)->first();
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }

        FmMenuType::where('id', $type->id)->update([
            'type' => $input['type'],
            'title' => $input['title'],
            'info' => $input['info'],
            'description' => $input['description'],
            'note' => $input['note'],
            'price_full' => isset($input['price_full']) ? $input['price_full'] : '0.00',
            'price_half' => isset($input['price_half']) ? $input['price_half'] : '0.00',
            'weight' => isset($input['weight']) ? $input['weight'] : 0,
            'active' => isset($input['active']) ? $type->active : 0,
            'in_menu' => isset($input['in_menu']) ? $input['in_menu'] : 0,
        ]);

        if($request->thumb){
            $existing_thumb = $type->thumb;
            if($existing_thumb){
                Storage::delete('public/images/'.$existing_thumb);
            }
            $thumb = 'fm_type_thumb_'.$type->id.'_'.time().'.'.$request->thumb->extension(); 
            $request->thumb->storeAs('/images', $thumb, ['disk' => 'public']);
            FmMenuType::where('id', $type->id)->update([
                'thumb' => $thumb,
            ]);
        }
        if($request->cover_photo){
            $existing_cover_photo = $type->cover_photo;
            if($existing_cover_photo){
                Storage::delete('public/images/'.$existing_cover_photo);
            }
            $cover_photo = 'fm_type_cover_'.$type->id.'_'.time().'.'.$request->cover_photo->extension(); 
            $request->cover_photo->storeAs('/images', $cover_photo, ['disk' => 'public']);
            FmMenuType::where('id', $type->id)->update([
                'cover_photo' => $cover_photo,
            ]);
        }

        return redirect('/admin/foodmenu/type/'.$type->id)->with('success', 'Food menu type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
