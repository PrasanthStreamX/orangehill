@extends('events::backend.layouts.master')
@section('title') Events @endsection
@section('moduleContent')
    <h1 class="page-title">Create Event</h1>
    <div><a href="/admin/events">Back</a></div>
    <div style="margin-top: 1.5rem">
        <form action="{{route('events.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="title" class="form-label">Title <span class="asterisk">*</span></label>
                <div>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" required>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <div>
                    <textarea name="description" id="description" cols="10" rows="2" class="form-control">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="notes" class="form-label">Notes</label>
                <div>
                    <textarea name="notes" id="notes" cols="30" rows="2" class="form-control">{{old('notes')}}</textarea>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-sm-6 col-lg-2">
                    <label for="start_date">Start <span class="asterisk">*</span></label>
                    <div>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{old('start_date')}}" required>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <label for="end_date">End</label>
                    <div>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{old('end_date')}}">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-sm-6 col-lg-4">
                    <label for="thumb">Image</label>
                    <input type="file" name="thumb" id="thumb" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
