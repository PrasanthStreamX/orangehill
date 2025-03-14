@extends('layouts/backend/master')

@php
/* Display elements */
$isNavbar = ($isNavbar ?? true);
$isMenu = ($isMenu ?? true);
$isFooter = ($isFooter ?? true);
@endphp

@section('contentLayout')
<div class="layout-wrapper">
    <div class="layout-container">
        @if ($isNavbar)
            @include('layouts.backend.sections.navbar.navbar')
        @endif
        <div class="content-wrapper">
            
            @yield('content')
        </div>
        @if ($isFooter)
            @include('layouts.backend.sections.footer.footer')
        @endif
    </div>
</div>
@endsection