@extends('foodmenu::layouts.backend.master')
@section('title') Create Menu Type @endsection
@section('moduleContent')
    <h1 class="page-title">Create Menu Type</h1>

    <div>
        <form action="{{ route('foodmenu.type.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
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
                <input type="checkbox" name="active" id="active" class="form-check-input" value="1" @checked(old('active'))>
                <label for="active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
