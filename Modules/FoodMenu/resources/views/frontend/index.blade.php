@extends('foodmenu::layouts.frontend.master')
@section('title') Menu @endsection
@section('moduleContent')
<div class="container">
    <section class="section-menu-list">
        <ul class="nav nav-tabs menu-list-tab" id="myTab" role="tablist">
            @foreach ($types as $i => $type)    
                <li class="nav-item" role="presentation">
                    <a href="#{{$type->slug}}-tab" class="nav-link @if($i==0) active @endif" id="{{$type->slug}}-tab" data-bs-toggle="pill" data-bs-target="#{{$type->slug}}" role="tab" aria-controls="{{$type->slug}}" aria-selected="true">{{$type->title}}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">
            @foreach ($types as $i => $type)
            <div class="tab-pane fade show @if($i==0) active @endif" id="{{$type->slug}}" role="tabpanel" aria-labelledby="{{$type->slug}}-tab">
                <div class="menu-list-wrapper list list_{{$type->type}}">
                    @foreach ($menuGroups as $group)
                    @if($group->type->id == $type->id)
                    <div class="list-section">
                        <h2 class="list-section-title">{{$group->category->title}}</h2>
                        <ul class="menu-list">
                            @foreach ($menus as $item)
                            @if($item->category_id == $group->category_id && $item->type_id == $group->type_id)
                            <li class="item item-dflex">
                                <a href="#" class="link item-dflex">
                                    <span class="image">
                                        <img src="{{url('storage/images/'.$item->item->thumb)}}" alt="">
                                    </span>
                                    <span class="details">
                                        <span class="title">{{$item->item->title}}</span>
                                        <span class="price">${{$item->item->price}}</span>
                                        <span class="description">{{$item->item->description}}</span>
                                    </span>
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection