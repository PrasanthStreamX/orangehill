@extends('photogallery::layouts.backend.master')
@section('title') Gallery @endsection
@section('moduleContent')
    <h1 class="page-title">Galleries</h1>
    <div><a href="/admin/gallery/create">Add Gallery</a></div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Weight</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                    <tr>
                        <td>{{$gallery->title}}</td>
                        <td>{{$gallery->description}}</td>
                        <td>{{$gallery->weight}}</td>
                        <td>{{$gallery->active ? 'Yes' : 'No'}}</td>
                        <td>
                            <div class="actions">
                                <a href="/admin/gallery/{{$gallery->id}}"><i class="fa-solid fa-eye"></i></a>
                                <a href="/admin/gallery/{{$gallery->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
                                <a href="/admin/media/create?gallery={{$gallery->id}}">Add Media</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
