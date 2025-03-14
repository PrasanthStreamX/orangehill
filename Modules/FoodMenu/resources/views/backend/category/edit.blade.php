@extends('foodmenu::layouts.backend.master')
@section('title') Edity Menu Category @endsection
@section('moduleContent')
    <h1 class="page-title">Edit Menu Category</h1>
    <div>
        <a href="/admin/foodmenu/category">List</a> | 
        <a href="/admin/foodmenu/category/{{$selectedCategory->id}}">View</a>
    </div>
    <div>
        <form action="{{ route('foodmenu.category.update', $selectedCategory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <div>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('category') ?? $selectedCategory->title}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="info" class="form-label">Info</label>
                <div>
                    <textarea type="text" name="info" id="info" class="form-control">{{ old('info') ?? $selectedCategory->info }}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <div>
                    <textarea type="text" name="description" id="description" class="form-control">{{ old('description') ?? $selectedCategory->description }}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <div>
                    <textarea type="text" name="note" id="note" class="form-control">{{ old('note') ?? $selectedCategory->note }}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="thumb">Thumbnail Image</label>
                <div class="row">
                    @if($selectedCategory->thumb)
                    <div class="col-sm-4 col-lg-2">
                        <img src="{{url('storage/images/'.$selectedCategory->thumb)}}" alt="{{$selectedCategory->title}}" style="width:100px">
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
                    @if($selectedCategory->cover_photo)
                    <div class="col-sm-4 col-lg-2">
                        <img src="{{url('storage/images/'.$selectedCategory->cover_photo)}}" alt="{{$selectedCategory->title}}" style="width:200px">
                    </div>
                    @endif
                    <div class="col-sm-8 col-lg-10">
                        <input type="file" name="cover_photo" id="cover_photo" class="form-control">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="parent_id">Parent</label>
                <div>
                    <select name="parent_id" id="parent_id" class="form-select">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @selected($category->id == $selectedCategory->parent_id)>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="weight">Weight</label>
                <div>
                    <input type="number" name="weight" id="weight" class="form-control" value="{{old('weight') ?? $selectedCategory->weight}}">
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="active" id="active" class="form-check-input" value="1" @checked($selectedCategory->active)>
                <label for="active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
