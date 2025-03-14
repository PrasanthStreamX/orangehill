@extends('foodmenu::layouts.backend.master')
@section('title') Edit Menu Type @endsection
@section('moduleContent')
    <h1 class="page-title">Edit Menu Type</h1>
    <div>
        <a href="/admin/foodmenu/type">List</a> | 
        <a href="/admin/foodmenu/type/{{$type->id}}">View</a>
    </div>
    <div>
        <form action="{{ route('foodmenu.type.update', $type->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <div>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title') ?? $type->title}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="info" class="form-label">Info</label>
                <div>
                    <textarea type="text" name="info" id="info" class="form-control">{{old('info') ?? $type->info}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <div>
                    <textarea type="text" name="description" id="description" class="form-control">{{old('description') ?? $type->description}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <div>
                    <textarea type="text" name="note" id="note" class="form-control">{{old('note') ?? $type->note}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="thumb">Thumbnail Image</label>
                <div class="row">
                    @if($type->thumb)
                    <div class="col-sm-4 col-lg-2">
                        <img src="{{url('storage/images/'.$type->thumb)}}" alt="{{$type->title}}" style="width:100px">
                    </div>
                    @endif
                    <div class="col-sm-8 col-lg-10">
                        <input type="file" name="thumb" id="thumb" class="form-control">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="cover_photo">Cover Photo</label>
                <div class="row">
                    @if($type->cover_photo)
                    <div class="col-sm-4 col-lg-2">
                        <img src="{{url('storage/images/'.$type->cover_photo)}}" alt="{{$type->title}}" style="width:200px">
                    </div>
                    @endif
                    <div class="col-sm-8 col-lg-10">
                        <input type="file" name="cover_photo" id="cover_photo" class="form-control">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="weight">Weight</label>
                <div>
                    <input type="number" name="weight" id="weight" class="form-control" value="{{old('weight') ?? $type->weight}}">
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="active" id="active" class="form-check-input" value="1" @checked($type->active)>
                <label for="active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
