@extends('photogallery::layouts.backend.master')
@section('title') Gallery @endsection
@section('moduleContent')
    <h1 class="page-title">Edit Gallery</h1>
    <div>
        <a href="/admin/gallery">List</a> | 
        <a href="/admin/gallery/.{{$gallery->id}}">View</a>
    </div>
    <div>
        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <div>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title') ?? $gallery->title}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <div>
                    <textarea type="text" name="description" id="description" class="form-control">{{old('description') ?? $gallery->description}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="weight">Weight</label>
                <div>
                    <input type="number" name="weight" id="weight" class="form-control" {{old('weight') ?? $gallery->weight}}>
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="active" id="active" class="form-check-input" value="1" @checked(old('active') ?? $gallery->active)>
                <label for="active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
