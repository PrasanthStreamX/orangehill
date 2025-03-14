@extends('foodmenu::layouts.backend.master')
@section('title') View Menu Item @endsection
@section('moduleContent')
    <h1 class="page-title">View Food Menu</h1>
    <div>
        <a href="/admin/foodmenu/item">Back</a> | 
        <a href="/admin/foodmenu/item/{{$item->id}}/edit">Edit</a>
    </div>
    <div>
        <h2>{{$item->title}}</h2>
        <div>{{$item->info}}</div>
        <div>{{$item->description}}</div>
        <div>{{$item->note}}</div>
        @if($item->thumb)<div><img src="{{url('storage/images/'.$item->thumb)}}" alt="{{$item->title}}" style="width:100px"></div>@endif
        @if($item->cover_photo)<div><img src="{{url('storage/images/'.$item->cover_photo)}}" alt="{{$item->title}}" style="width:500px"></div>@endif
    </div>
@endsection
