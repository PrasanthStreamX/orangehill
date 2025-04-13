<?php

namespace Modules\Events\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Modules\Events\Models\EvntEvent;

class EventsBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = EvntEvent::paginate(20);
        //dd(get_class($events));
        return view('events::backend.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events::backend.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'start_date' => 'required|date'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('error', 'Some fields are not valid');
        }

        $event = EvntEvent::create([
            'title' => $input['title'],
            'description' => isset($input['description']) ? $input['description'] : null,
            'notes' => isset($input['notes']) ? $input['notes'] : null,
            'start_date' => $input['start_date'],
            'end_date' => isset($input['end_date']) ? $input['end_date'] : $input['start_date'],
            'active' => isset($input['active']) ? $input['active'] : 1,
        ]);

        if($request->thumb){
            $thumb = 'evnt_event_thumb_'.$event->id.'_'.time().'.'.$request->thumb->extension(); 
            $request->thumb->storeAs('/images', $thumb, ['disk' => 'public']);
        }
        EvntEvent::where('id', $event->id)->update([
            'thumb' => $request->thumb ? $thumb : null,
        ]);

        return redirect('/admin/events')->with('success', 'New event created successfully');

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('events::backend.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('events::backend.edit');
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
