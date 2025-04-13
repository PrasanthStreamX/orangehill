<?php

namespace Modules\Events\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Events\Models\EvntEvent;

class EventsFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageFace = [
            'page_title' => 'Upcoming Events'
        ];
        $events = EvntEvent::whereDate('end_date', '>=', today())->where('active',1)->orderBy('start_date', 'asc')->get();
        return view('events::frontend.index', compact('events','pageFace'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events::create');
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
        return view('events::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('events::edit');
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
