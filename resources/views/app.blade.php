<html>
    @include('sections.head')
    @if(Auth::check())
        <body class="hold-transition skin-blue sidebar-mini">
            <div class="wrapper">
                <div id="app">
                    <App ruta="{{route('basepath')}}" :usuario="{{Auth::user()->load('file')}}"></App>
                </div>
            </div>
        </body>
    @else
        <body class="hold-transition login-page">
                <div id="app">
                    <Auth ruta="{{route('basepath')}}"></Auth>
                </div>
        </body>
    @endif
    @include('sections.script')
</html>
