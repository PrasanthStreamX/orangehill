@extends('foodmenu::layouts.backend.master')
@section('title') All Menus @endsection
@section('moduleContent')
    <h1 class="page-title">List food menu</h1>
    <div><a href="/admin/foodmenu/item/create">Add Menu Item</a></div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th style="width:110px">Thumb</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Active</th>
                    <th>Weight</th>
                    <th style="width:100px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>
                        @if($item->thumb)
                            <img src="{{url('storage/images/'.$item->thumb)}}" alt="{{$item->title}}" style="width:100px">
                        @else <div style="width:100px; height:100px; background:#eee"></div> 
                        @endif
                        </td>
                        <td>
                            {{$item->title}}<br />
                            @if(count($item->prices) > 0)
                                (@foreach($item->prices as $key => $priceItem)@if($key >= 1) / @endif{{$priceItem->title}}@endforeach)
                            @endif
                        </td>
                        <td>
                            @if(count($item->prices) > 0)
                                @foreach($item->prices as $key => $priceItem)@if($key >= 1) / @endif{{_price($priceItem->price)}}@endforeach
                            @else
                                {{_price($item->price)}}
                            @endif
                        </td>
                        <td>{{$item->active ? 'Yes' : 'No'}}</td>
                        <td>{{$item->weight}}</td>
                        <td>
                            <div class="actions">
                                <a href="/admin/foodmenu/item/{{$item->id}}"><i class="fa-solid fa-eye"></i></a>
                                <a href="/admin/foodmenu/item/{{$item->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
