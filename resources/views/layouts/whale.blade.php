<!doctype html>
<html>
    <head>

        @include('partials._head')

        <link href="{{ asset('/css/sidebar.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/sub.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap2-toggle.css') }}" rel="stylesheet">

    </head>
    <body>
    
    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        @include('whales._sidebar')
        @include('partials._nav')
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
        @include('whales._content')
        @include('whales._whaletable')


        @yield('content')
        </div>
        <!-- /#page-content-wrapper -->
        
    </div>

        @yield('scripts')

    </body>

    <script type="text/javascript" src="{!! asset('/js/bootstrap2-toggle.js') !!}"></script>
</html>
