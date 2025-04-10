<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') ? env('APP_NAME').' | ':''}} @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Styles -->
    @include('layouts.frontend.sections.styles')
</head>
<body>
    <div class="container-main"> 
        @include('layouts.frontend.sections.flash-message')
        @include('layouts.frontend.sections.header.header')
        <main class="content-main">
            @include('layouts.frontend.sections.page-face.default')
            @yield('content')       
        </main> 
        @include('layouts.frontend.sections.footer.footer')
    </div>
    @include('layouts.frontend.sections.scripts')
</body>
</html>