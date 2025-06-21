<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        @yield('title')
    </title>

    @include('admin.layout.cssLibs')

    @include('admin.layout.cssStyle')

</head>

<body>
    <script src="{{ asset('assets/admin/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page">

        <!-- Sidebar -->
        @include('admin.layout.sidebar')

        <!-- Navbar -->
        @include('admin.layout.navbar')


        <div class="page-wrapper">

            @yield('content')

            @include('admin.layout.footer')

        </div>
    </div>

    @include('admin.layout.layoutModal')


    @include('admin.layout.jsLibs')



    @include('admin.layout.jsScripts')

    @stack('js')

</body>

</html>
