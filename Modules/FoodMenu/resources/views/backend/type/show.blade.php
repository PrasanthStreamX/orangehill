@extends('foodmenu::layouts.backend.master')
@section('title') View Menu Type @endsection
@section('moduleContent')
    <h1 class="page-title">View Menu type</h1>
    <div>
        <a href="/admin/foodmenu/type">Back</a> | 
        <a href="/admin/foodmenu/type/{{$type->id}}/edit">Edit</a>
    </div>
    <div>
        <h2>{{$type->title}}</h2>
        <div>{{$type->info}}</div>
        <div>{{$type->description}}</div>
        <div>{{$type->note}}</div>
        @if($type->thumb)<div><img src="{{url('storage/images/'.$type->thumb)}}" alt="{{$type->title}}" style="width:100px"></div>@endif
        @if($type->cover_photo)<div><img src="{{url('storage/images/'.$type->cover_photo)}}" alt="{{$type->title}}" style="width:500px"></div>@endif
    </div>
@endsection
