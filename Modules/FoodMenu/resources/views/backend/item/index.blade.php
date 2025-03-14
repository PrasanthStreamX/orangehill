@extends('foodmenu::layouts.backend.master')
@section('title') All Menus @endsection
@section('moduleContent')
    <h1 class="page-title">List food menu</h1>
    <div><a href="/admin/foodmenu/item/create">Add Menu Item</a></div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Thumb</th>
                    <th>Title</th>
                    <th>Weight</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>@if($item->thumb)<img src="{{url('storage/images/'.$item->thumb)}}" alt="{{$item->title}}" style="width:100px">@endif</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->weight}}</td>
                        <td>{{$item->active ? 'Yes' : 'No'}}</td>
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
