<!doctype html>
<html>
    <head>

        @include('partials._head')

    </head>
    <body>
        <div class="container">
            
            @include('partials._nav')
            <br><br><br><br><br>

            <div class="content">
            
                @include('partials._messages')

                @yield('content')

                @yield('content2')

                @yield('content3')

                @yield('content4')

            </div>

            @include('partials._footer')
        </div>

        @yield('scripts')

    </body>
</html>
