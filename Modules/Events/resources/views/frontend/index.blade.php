@extends('events::frontend.layouts.master')
@section('title') Events @endsection
@section('moduleContent')
<div class="container">
    <section class="section-menu-list">
        @foreach ($events as $event)
            <div style="padding:1rem; border-bottom:1px solid #ddd">
                <div>{{$event->start_date}} - {{$event->end_date}}</div>
                <div>{{$event->title}}</div>
                <div>{{$event->description}}</div>
                <div><div class="list-image">@if($event->thumb)<img src="{{url('storage/images/'.$event->thumb)}}" alt="{{$event->title}}" style="width:80px; height:80px">@endif</div></div>
                <div>@if($event->foodmenu) <a href="/menu/model/{{$event->foodmenu}}" class="btn btn-primary">View Menu</a>@endif</div>
            </div>
        @endforeach
    </section>
</div>
@endsection