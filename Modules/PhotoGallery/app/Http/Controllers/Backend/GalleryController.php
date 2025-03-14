<?php

namespace Modules\PhotoGallery\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Modules\PhotoGallery\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the galley types.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('weight','asc')->paginate();
        return view('photogallery::backend.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photogallery::backend.gallery.create');
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

        $item = Gallery::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'weight' => isset($input['weight']) ? $input['weight'] : 0,
            'active' => isset($input['active']) ? $input['active'] :  1,
        ]);

        return redirect('/admin/gallery')->with('success', 'Gallery created successfully');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        return view('photogallery::backend.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        return view('photogallery::backend.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::where('id',$id)->first();
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }

        Gallery::where('id', $gallery->id)->update([
            'title' => $input['title'],
            'description' => $input['description'],
            'weight' => $input['weight'],
            'active' => isset($input['active']) ?? $gallery->active
        ]);

        return redirect('/admin/gallery')->with('success', 'Gallery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
    
}
