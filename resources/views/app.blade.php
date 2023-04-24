<!DOCTYPE html>
<html>
    @include('sections.head')
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <div id="app">
            <App ruta="{{route('basepath')}}"></App>
        </div>
    </div>
    @include('sections.script')
</body>
</html>
