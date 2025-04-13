@extends('foodmenu::layouts.frontend.master')
@section('title') Menu @endsection
@section('moduleContent')
<div class="container">
    <div>
        @foreach ($menuGroups as $menu_group_key => $group)
            <h2>{{$group->category->title}}</h2>
            <ul>
                @foreach ($menus as $menu)
                @if($menu->category_id == $group->category_id)
                <li style="padding: 1rem 0; border-bottom:1px solid #ddd">
                    <div class="title">{{$menu->item->title}}</div>
                    <div style="color:#666"><small>{{$menu->item->description}}</small></div>
                </li>
                @endif
                @endforeach
            </ul>
        @endforeach
    </div>
</div>
@endsection