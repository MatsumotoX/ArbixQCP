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
        @include('liveprices._sidebar')
        @include('partials._nav')
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

        @yield('content')

        @include('partials._footer')

        </div>
        <!-- /#page-content-wrapper -->
    </div>

        @yield('scripts')

    </body>

    <script type="text/javascript" src="{!! asset('/js/bootstrap2-toggle.js') !!}"></script>
</html>
