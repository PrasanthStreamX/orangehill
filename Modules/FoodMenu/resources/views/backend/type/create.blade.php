@extends('foodmenu::layouts.backend.master')
@section('title') Create Menu Type @endsection
@section('moduleContent')
    <h1 class="page-title">Create Menu Type</h1>

    <div>
        <form action="{{ route('foodmenu.type.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3 row">
                <label for="type" class="form-label">Select Type</label>
                <div class="col-sm-4 col-lg-2">
                    <select name="type" id="type" class="form-select">
                        <option value="default" @selected(old('type') == 'default')>Normal</option>
                        <option value="package" @selected(old('type') == 'package')>Package</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <div>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="info" class="form-label">Info</label>
                <div>
                    <textarea type="text" name="info" id="info" class="form-control">{{old('info')}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <div>
                    <textarea type="text" name="description" id="description" class="form-control">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <div>
                    <textarea type="text" name="note" id="note" class="form-control">{{old('note')}}</textarea>
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
                            <input type="number" name="price_full" id="price_full" class="form-control" value="{{old('price_full') ?? '0.00'}}">
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
                            <input type="number" name="price_half" id="price_half" class="form-control" value="{{old('price_half') ?? '0.00'}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-6 col-lg-4">
                    <div>
                        <label for="thumb" class="form-label">Thumbnail Image</label>
                        <div>
                            <input type="file" name="thumb" id="thumb" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div>
                        <label for="cover_photo" class="form-label">Cover Photo</label>
                        <div>
                            <input type="file" name="cover_photo" id="cover_photo" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="col-sm-4 col-lg-2">
                    <label for="weight" class="form-label">Weight</label>
                    <div>
                        <input type="number" name="weight" id="weight" class="form-control" value="{{old('weight')}}">
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-4 col-lg-2">
                    <input type="checkbox" name="active" id="active" class="form-check-input" value="1" @checked(old('active') ?? true)>
                    <label for="active">Active</label>
                </div>
                <div class="col-sm-4 col-lg-2">
                    <input type="checkbox" name="active" id="in_menu" class="form-check-input" value="1" @checked(old('in_menu') ?? true)>
                    <label for="in_menu">Add to Navigation Menu</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
