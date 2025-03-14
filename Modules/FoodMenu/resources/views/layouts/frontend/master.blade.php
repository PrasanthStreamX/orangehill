@extends('layouts.frontend.master')
@section('page-styles') @vite(['Modules/FoodMenu/resources/assets/sass/frontend/menu.scss']) @endsection
@section('content') @yield('moduleContent') @endsection
@php
    if(!isset($pageFace['page_title'])) $pageFace['page_title'] = 'Safeer';
    if(!isset($pageFace['page_bg'])) $pageFace['page_bg'] = 'storage/images/oh-01.avif';
@endphp