<?php

namespace Modules\PhotoGallery\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\FoodMenu\Models\FmMenuCategory;
use Modules\FoodMenu\Models\FmMenuType;
use Modules\PhotoGallery\Models\Gallery;
use Modules\PhotoGallery\Models\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Media::where('active',1)->orderBy('created_at','desc')->get();
        return view('photogallery::backend.media.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($gallery_id)
    {
        $galleries = Gallery::where('active',1)->orderBy('weight','asc')->get();
        return view('photogallery::backend.media.create',  compact('galleries'));
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
        return view('photogallery::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('photogallery::edit');
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
