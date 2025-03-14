@extends('foodmenu::layouts.backend.master')
@section('title') Menu Categories @endsection
@section('moduleContent')
    <h1 class="page-title">Menu Categories</h1>
    <div><a href="/admin/foodmenu/category/create">Add Category</a></div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Weight</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(count($categories) > 0)
                    @foreach ($categories as $category)
                        @include('foodmenu::backend.category.partials.category', $category)
                    @endforeach
                @endif
                
            </tbody>
        </table>
    </div>
@endsection
