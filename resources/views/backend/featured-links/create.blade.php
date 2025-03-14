@extends('layouts.backend.layout')
@section('title') Featured Links @endsection
@section('content')
    <h1 class="page-title">Add Featured Links</h1>
    <div>
        <a href="/admin/featured-links">List</a>
    </div>
    <div>
        <form action="{{route('featured-links.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="title">Title</label>
                <div>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="info">Info</label>
                <div>
                    <textarea name="info" id="info" cols="10" rows="1" class="form-control">{{old('info')}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <div>
                    <textarea name="description" id="description" cols="10" rows="1" class="form-control">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="url">Url</label>
                <div>
                    <input type="text" name="url" value="{{old('url')}}" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="thumb">Image</label>
                <div>
                    <input type="file" name="thumb" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="weight">Weight</label>
                <div>
                    <input type="number" name="weight" id="weight" class="form-control">
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="active" id="active" class="form-check-input" value="1" checked>
                <label for="active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection