@extends('layouts.frontend.master')
@section('page-styles') @vite(['Modules/Events/resources/assets/sass/frontend/events.scss']) @endsection
@section('content') @yield('moduleContent') @endsection
@php
    if(!isset($pageFace['page_title'])) $pageFace['page_title'] = 'Events';
    if(!isset($pageFace['page_bg'])) $pageFace['page_bg'] = 'storage/images/oh-01.avif';
@endphp