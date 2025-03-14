@extends('foodmenu::layouts.backend.master')
@section('title') Menu Types @endsection
@section('moduleContent')
    <h1 class="page-title">Menu types</h1>
    <div><a href="/admin/foodmenu/type/create">Add Type</a></div>
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
                @foreach ($types as $type)
                    <tr>
                        <td>@if($type->thumb)<img src="{{url('storage/images/'.$type->thumb)}}" alt="{{$type->title}}" style="width:100px">@endif</td>
                        <td>{{$type->title}}</td>
                        <td>{{$type->weight}}</td>
                        <td>{{$type->active ? 'Yes' : 'No'}}</td>
                        <td>
                            <div class="actions">
                                <a href="/admin/foodmenu/type/{{$type->id}}"><i class="fa-solid fa-eye"></i></a>
                                <a href="/admin/foodmenu/type/{{$type->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
