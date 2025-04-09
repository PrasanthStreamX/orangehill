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
            <div class="mb-3 row">
                <label for="type" class="form-label">Select Type</label>
                <div class="col-sm-4 col-lg-2">
                    <select name="type" id="type" class="form-select">
                        <option value="default" @selected(old('type') ? old('type') == 'default' : $type->type == 'default' )>Normal</option>
                        <option value="package" @selected(old('type') ? old('type') == 'package' : $type->type == 'package' )>Package</option>
                    </select>
                </div>
            </div>
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
            <div class="mb-3 row">
                <div class="col-sm-4 col-lg-2">
                    <div>
                        <label for="price_full" class="form-label">Price Adult</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="number" name="price_full" id="price_full" class="form-control" value="{{old('price_full') ?? $type->price_full}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-2">
                    <div>
                        <label for="price_half" class="form-label">Price Children</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">$</span>
                            </div>
                            <input type="number" name="price_half" id="price_half" class="form-control" value="{{old('price_half') ?? $type->price_half}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-6">
                    <label for="thumb"  class="form-label">Thumbnail Image</label>
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
                <div class="col-sm-6">
                    <label for="cover_photo" class="form-label">Cover Photo</label>
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
            </div>
            <div class="mb-3 row">
                <div class="col-sm-4 col-lg-2">
                    <label for="weight" class="form-label">Weight</label>
                    <div>
                        <input type="number" name="weight" id="weight" class="form-control" value="{{old('weight') ?? $type->weight}}">
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-4 col-lg-2">
                    <input type="checkbox" name="active" id="active" class="form-check-input" value="1" @checked(old('active') ?? $type->active)>
                    <label for="active">Active</label>
                </div>
                <div class="col-sm-4 col-lg-2">
                    <input type="checkbox" name="active" id="in_menu" class="form-check-input" value="1" @checked(old('in_menu') ?? $type->in_menu)>
                    <label for="in_menu">Add to Navigation Menu</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
