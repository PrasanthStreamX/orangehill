<?php

namespace Modules\FoodMenu\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Modules\FoodMenu\Models\FmMenuCategory;
use Modules\FoodMenu\Models\FmMenuType;

class FoodMenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FmMenuCategory::withDepth()->orderBy('weight', 'asc')->get()->toTree();
        return view('foodmenu::backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = FmMenuCategory::orderBy('weight', 'asc')->get();
        return view('foodmenu::backend.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }
        $category = FmMenuCategory::create([
            'title' => $input['title'],
            'parent_id' => $input['parent_id'],
            'info' => $input['info'],
            'description' => $input['description'],
            'note' => $input['note'],
            'weight' => isset($input['weight']) ? $input['weight'] : 0,
            'active' => isset($input['active']) ?? 1,
        ]);
        if($request->thumb){
            $thumb = 'fm_category_thumb_'.$category->id.'_'.time().'.'.$request->thumb->extension(); 
            $request->thumb->storeAs('/images', $thumb, ['disk' => 'public']);
        }
        if($request->cover_photo){
            $cover_photo = 'fm_category_cover_'.$category->id.'_'.time().'.'.$request->cover_photo->extension(); 
            $request->cover_photo->storeAs('/images', $cover_photo, ['disk' => 'public']);
        }
        FmMenuCategory::where('id', $category->id)->update([
            'thumb' => $request->thumb ? $thumb : null,
            'cover_photo' => $request->cover_photo ? $cover_photo : null,
        ]);
        return redirect('/admin/foodmenu/category/'.$category->id)->with('success', 'New food menu category added successfully');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $category = FmMenuCategory::where('id',$id)->first();
        if(!$category){
            return redirect('/admin/foodmenu/category')->with('error', 'The requested category does not found.');
        }
        return view('foodmenu::backend.category.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $selectedCategory = FmMenuCategory::where('id',$id)->first();
        $categories = FmMenuCategory::orderBy('weight', 'asc')->get();
        return view('foodmenu::backend.category.edit', compact('selectedCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = FmMenuCategory::where('id',$id)->first();
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }

        FmMenuCategory::where('id', $category->id)->update([
            'title' => $input['title'],
            'parent_id' => isset($input['parent_id']) ?? $category->parent_id,
            'info' => $input['info'],
            'description' => $input['description'],
            'note' => $input['note'],
            'weight' => $input['weight'],
            'active' => isset($input['active']) ?? $category->active
        ]);

        if($request->thumb){
            $existing_thumb = $category->thumb;
            if($existing_thumb){
                Storage::delete('public/images/'.$existing_thumb);
            }
            $thumb = 'fm_category_thumb_'.$category->id.'_'.time().'.'.$request->thumb->extension(); 
            $request->thumb->storeAs('/images', $thumb, ['disk' => 'public']);
            FmMenuCategory::where('id', $category->id)->update([
                'thumb' => $thumb,
            ]);
        }
        if($request->cover_photo){
            $existing_cover_photo = $category->cover_photo;
            if($existing_cover_photo){
                Storage::delete('public/images/'.$existing_cover_photo);
            }
            $cover_photo = 'fm_category_cover_'.$category->id.'_'.time().'.'.$request->cover_photo->extension(); 
            $request->cover_photo->storeAs('/images', $cover_photo, ['disk' => 'public']);
            FmMenuCategory::where('id', $category->id)->update([
                'cover_photo' => $cover_photo,
            ]);
        }

        return redirect('/admin/foodmenu/category/'.$category->id)->with('success', 'Food menu category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
