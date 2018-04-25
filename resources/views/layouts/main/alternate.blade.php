<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.main.scripts.head')

</head>

<body class="{{ view_body_class(Route::getCurrentRoute()->getName()) }} sidebar-collapse">
    
    @include ('layouts.main.nav') 
    
    @yield('content')

</body>
@include('layouts.main.scripts.tail')

</html>