@extends('foodmenu::layouts.backend.master')
@section('title') View Menu Category @endsection
@section('moduleContent')
    <h1 class="page-title">View Menu Category</h1>
    <div>
        <a href="/admin/foodmenu/category">Back</a> | 
        <a href="/admin/foodmenu/category/{{$category->id}}/edit">Edit</a>
    </div>
    <div>
        <h2>{{$category->title}}</h2>
        <div>{{$category->info}}</div>
        <div>{{$category->description}}</div>
        <div>{{$category->note}}</div>
        @if($category->thumb)<div><img src="{{url('storage/images/'.$category->thumb)}}" alt="{{$category->title}}" style="width:100px"></div>@endif
        @if($category->cover_photo)<div><img src="{{url('storage/images/'.$category->cover_photo)}}" alt="{{$category->title}}" style="width:500px"></div>@endif
    </div>
@endsection
