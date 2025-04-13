@extends('events::backend.layouts.master')
@section('title') Events @endsection
@section('moduleContent')
    <h1 class="page-title">Event List</h1>
    <div><a href="/admin/events/create">Create Event</a></div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Thumb</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>
                        @if($event->thumb)
                            <img src="{{url('storage/images/'.$event->thumb)}}" alt="{{$event->title}}" style="width:100px">
                        @else <div style="width:100px; height:100px; background:#eee"></div> 
                        @endif
                    </td>
                    <td>{{$event->title}}</td>
                    <td>{{$event->start_date}}</td>
                    <td>{{$event->end_date}}</td>
                    <td>
                        <div class="actions">
                            @if($event->foodmenu)
                            <a href="/admin/foodmenu/create/{{$event->foodmenu}}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Menu"><i class="fa-solid fa-utensils"></i> View</a>
                            @else
                            <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Create Menu">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#menuModal{{$event->id}}"><i class="fa-solid fa-utensils"></i> Add</button>
                            </span>
                            @endif
                            <a href="#" class="btn btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-sm"><i class="fa fa-trash"></i></a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="menuModal{{$event->id}}" tabindex="-1" aria-labelledby="menuModal{{$event->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('foodmenu.type.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="menuModal{{$event->id}}Label">Are you sure want to create menu?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="type" value="package">
                                            <input type="hidden" name="title" value="{{$event->title}}">
                                            <input type="hidden" name="description" value="{{$event->description}}">
                                            <input type="hidden" name="note" value="{{$event->notes}}">
                                            <input type="hidden" name="note" value="{{$event->notes}}">
                                            <input type="hidden" name="thumb" value="{{$event->thumb}}">
                                            <input type="hidden" name="model_type" value="{{'App\\'.get_class($event)}}">
                                            <input type="hidden" name="model_label" value="event">
                                            <input type="hidden" name="model_id" value="{{$event->id}}">
                                            <div class="form-group mb-3 row">
                                                <div class="col-sm-6">
                                                    <label for="price_full" class="form-label">Price Adult</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">$</span>
                                                        </div>
                                                        <input type="number" name="price_full" id="price_full" class="form-control" value="{{old('price_full') ?? '0.00'}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="price_half" class="form-label">Price Children</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon2">$</span>
                                                        </div>
                                                        <input type="number" name="price_half" id="price_half" class="form-control" value="{{old('price_half') ?? '0.00'}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Create Menu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection