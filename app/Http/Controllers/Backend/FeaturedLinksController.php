<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FeaturedLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FeaturedLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $links = FeaturedLink::get();
        return view('backend.featured-links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.featured-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required',
            'thumb' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }

        $link = FeaturedLink::create([
            'title' => $input['title'],
            'info' => $input['info'],
            'description' => $input['description'],
            'url' => $input['url'],
            'weight' => isset($input['weight']) ? $input['weight'] : 0,
            'active' => isset($input['active']) ? $input['active'] :  1,
        ]);

        if($request->thumb){
            $thumb = 'fm_link_thumb_'.$link->id.'_'.time().'.'.$request->thumb->extension(); 
            $request->thumb->storeAs('/images', $thumb, ['disk' => 'public']);
        }

        FeaturedLink::where('id', $link->id)->update([
            'thumb' => $request->thumb ? $thumb : null,
        ]);

        return redirect('/admin/featured-links')->with('success', 'New type added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $link = FeaturedLink::where('id',$id)->first();
        return view('backend.featured-links.edit' , compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $link = FeaturedLink::where('id',$id)->first();
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }

        FeaturedLink::where('id', $link->id)->update([
            'title' => $input['title'],
            'info' => $input['info'],
            'description' => $input['description'],
            'url' => $input['url'],
            'weight' => $input['weight'],
            'active' => isset($input['active']) ?? $link->active
        ]);

        if($request->thumb){
            $existing_thumb = $link->thumb;
            if($existing_thumb){
                Storage::delete('public/images/'.$existing_thumb);
            }
            $thumb = 'fm_link_thumb_'.$link->id.'_'.time().'.'.$request->thumb->extension(); 
            $request->thumb->storeAs('/images', $thumb, ['disk' => 'public']);
            FeaturedLink::where('id', $link->id)->update([
                'thumb' => $thumb,
            ]);
        }

        return redirect('/admin/featured-links')->with('success', 'Food menu type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $link = FeaturedLink::where('id',$id)->first();
        if($link->thumb){
            Storage::delete('public/images/'.$link->thumb);
        }
        $link->delete();
        return redirect('/admin/featured-links')->with('success','Featured link deleted successfully');
    }
}
