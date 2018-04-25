<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.dashboard.scripts.head')

</head>

<body>
    
    <div class="wrapper">
        
        @include ('layouts.dashboard.sidebar') 
        
        <div class="main-panel">
            
            @include ('layouts.dashboard.nav') 
        
            <div class="panel-header panel-header-sm"></div>

            <div class="content">

                @yield('content')

            </div>
            
        </div>
    
    </div>
    
</body>
@include('layouts.dashboard.scripts.tail')

</html>