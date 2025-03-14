@extends('photogallery::layouts.backend.master')
@section('title') Gallery @endsection
@section('moduleContent')
    <h1 class="page-title">View Gallery</h1>
    <div>
        <a href="/admin/gallery">List</a> | 
        <a href="/admin/gallery/.{{$gallery->id}}./edit">Edit Gallery</a>
    </div>
    <div>
        
    </div>
@endsection
