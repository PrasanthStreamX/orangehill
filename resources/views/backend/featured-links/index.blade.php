@extends('layouts.backend.layout')
@section('title') Featured Links @endsection
@section('content')
    <h1 class="page-title">Featured Links</h1>
    <div>
        <a href="/admin/featured-links/create">Create Link</a>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Info</th>
                    <th>Description</th>
                    <th>Url</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $link)
                    <tr>
                        <td><img src="{{url('storage/images/'.$link->thumb)}}" alt="" style="width:100px"></td>
                        <td>{{$link->title}}</td>
                        <td>{{$link->info}}</td>
                        <td>{{$link->description}}</td>
                        <td>{{$link->url}}</td>
                        <td>{{$link->active ? 'Yes' : 'No'}}</td>
                        <td>
                            <a href="/admin/featured-links/{{$link->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection