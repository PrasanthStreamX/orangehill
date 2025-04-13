@extends('events::frontend.layouts.master')
@section('title') Upcoming Events @endsection
@section('moduleContent')
<div class="container">
    <section class="section-event-list">
        <ul class="event-list">
            @foreach ($events as $event)
            <li class="item">
                <div class="date">
                    <div class="item date-from">
                        @if($event->end_date > $event->start_date) <div class="title">START DATE</div> @endif
                        <div class="body">
                            <span class="year">{{date('Y F', strtotime($event->start_date))}}</span>
                            <span class="day_num">{{date('d', strtotime($event->start_date))}}</span>
                            <span class="day">{{date('D', strtotime($event->start_date))}}</span>
                        </div>
                    </div>
                    @if($event->end_date > $event->start_date) 
                    <div class="item date-to">
                        <div class="title">END DATE</div>
                        <div class="body">
                            <span class="year">{{date('Y F', strtotime($event->end_date))}}</span>
                            <span class="day_num">{{date('d', strtotime($event->end_date))}}</span>
                            <span class="day">{{date('D', strtotime($event->end_date))}}</span>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="content">
                    <div class="title">{{$event->title}}</div>
                    <div class="info">{{$event->description}}</div>
                    <div class="info">{{$event->notes}}</div>
                    <div class="actions">
                        @if($event->foodmenu) <a href="/menu/model/{{$event->foodmenu}}" class="btn btn-sm btn-outline-primary">View Menu</a>@endif
                    </div>
                </div>
                <div class="image">
                    @if($event->thumb)<img src="{{url('storage/images/'.$event->thumb)}}" alt="{{$event->title}}" >@endif
                </div>
            </li>
            @endforeach
        </ul>
    </section>
</div>
@endsection