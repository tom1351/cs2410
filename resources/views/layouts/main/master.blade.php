<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.main.scripts.head')

</head>

<body class="{{ view_body_class(Route::getCurrentRoute()->getName()) }} sidebar-collapse">
    @yield('header')
    
    @include ('layouts.main.nav') 
    
    @yield('content')
    
    @include('layouts.main.footer')

</body>
@include('layouts.main.scripts.tail')
@yield('custom-scripts')
</html>