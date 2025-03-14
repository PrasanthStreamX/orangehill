@extends('layouts.backend.layout')
@section('title') Featured Links @endsection
@section('content')
    <h1 class="page-title">Edit Featured Links</h1>
    <div>
        <a href="/admin/featured-links">List</a>
    </div>
    <div>
        <form action="{{route('featured-links.update', $link->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title">Title</label>
                <div>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title') ?? $link->title}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="info">Info</label>
                <div>
                    <textarea type="text" name="info" id="info" class="form-control">{{old('info') ?? $link->info}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <div>
                    <textarea type="text" name="description" id="description" class="form-control">{{old('description') ?? $link->description}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="url">Url</label>
                <div>
                    <input type="text" name="url" id="url" class="form-control" value="{{old('url') ?? $link->url}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="thumb">Thumbnail Image</label>
                <div class="row">
                    @if($link->thumb)
                    <div class="col-sm-4 col-lg-2">
                        <img src="{{url('storage/images/'.$link->thumb)}}" alt="{{$link->title}}" style="width:100px">
                    </div>
                    @endif
                    <div class="col-sm-8 col-lg-10">
                        <input type="file" name="thumb" id="thumb" class="form-control">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="weight">Weight</label>
                <div>
                    <input type="number" name="weight" id="weight" class="form-control" value="{{old('weight') ?? $link->weight}}">
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="active" id="active" class="form-check-input" value="1" @checked($link->active)>
                <label for="active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection