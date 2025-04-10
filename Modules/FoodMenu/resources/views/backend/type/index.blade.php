@extends('foodmenu::layouts.backend.master')
@section('title') Menu List @endsection
@section('moduleContent')
    <h1 class="page-title">Menu List</h1>
    <div><a href="/admin/foodmenu/type/create">Add Menu</a></div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Thumb</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Price Adult</th>
                    <th>Price Child</th>
                    <th>Weight</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td><div class="list-image">@if($type->thumb)<img src="{{url('storage/images/'.$type->thumb)}}" alt="{{$type->title}}" style="width:80px; height:80px">@endif</div></td>
                        <td>{{$type->title}}</td>
                        <td>{{ucfirst($type->type)}}</td>
                        <td>{{_price($type->price_full)}}</td>
                        <td>{{_price($type->price_half)}}</td>
                        <td>{{$type->weight}}</td>
                        <td>{{$type->active ? 'Yes' : 'No'}}</td>
                        <td>
                            <div class="actions">
                                <a href="/admin/foodmenu/create/{{$type->id}}" title="Add Menu Items"><i class="fa-solid fa-utensils"></i></a>
                                <a href="/admin/foodmenu/type/{{$type->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
