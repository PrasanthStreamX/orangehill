<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet">

@vite([
    'resources/assets/vendor/libs/bootstrap/css/bootstrap.min.css',
    'resources/sass/backend/main.scss', 
])
@yield('page-styles')