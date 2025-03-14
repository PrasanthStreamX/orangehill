@extends('foodmenu::layouts.backend.master')
@section('title') Add Menu @endsection
@section('moduleContent')
    <h1 class="page-title">Create Menu Item</h1>
    <div>
        <form action="{{route('foodmenu.item.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="title">Title</label>
                <div>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="short_info">Short Description</label>
                <div>
                    <textarea name="info" id="short_info" rows="2" class="form-control">{{old('info')}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <div>
                    <textarea name="description" id="description" rows="6" class="form-control">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="note">Note</label>
                <div>
                    <textarea name="note" id="note" rows="2" class="form-control">{{old('note')}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <div>
                    <input type="number" name="price" id="price" class="form-control" value="{{old('price')}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="thumb">Thumbnail Image</label>
                <div>
                    <input type="file" name="thumb" id="thumb" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="cover_photo">Cover Photo</label>
                <div>
                    <input type="file" name="cover_photo" id="cover_photo" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="weight">Weight</label>
                <div>
                    <input type="number" name="weight" id="weight" class="form-control" value="{{old('weight')}}">
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="active" id="active" class="form-check-input" value="1" @checked(old('active') ?? true)>
                <label for="active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
