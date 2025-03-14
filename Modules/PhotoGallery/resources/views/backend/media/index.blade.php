@extends('photogallery::layouts.backend.master')
@section('title') Gallery @endsection
@section('moduleContent')
    <h1 class="page-title">View Gallery</h1>
    <div>
        <a href="/admin/gallery/create">Add Gallery</a>
    </div>
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
                @foreach ($medias as $media)
                    <tr>
                        <td>{{$media->title}}</td>
                        <td>{{$media->description}}</td>
                        <td>{{$media->weight}}</td>
                        <td>{{$media->active ? 'Yes' : 'No'}}</td>
                        <td>
                            <div class="actions">
                                <a href="/admin/media/create?gallery={{$media->id}}">Add Media</a>
                            </div>
                            <input type="hidden" name="media[]" value="{{$media->id}}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
