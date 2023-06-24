<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>FeederSync | {{ $title }}</title>
</head>

<body class="text-sm font-medium bg-gray-100 font-montserrat">

    <!-- start navbar -->
    @include('dashboard.components.navbar')
    <!-- end navbar -->

    <!-- strat wrapper -->
    <div class="flex flex-row flex-wrap h-screen">

        <!-- start sidebar -->
        @include('dashboard.components.sidebar')
        <!-- end sidbar -->

        <!-- strat content -->
        <div class="flex-1 p-6 bg-gray-100 md:mt-16">
            @yield('content')
        </div>
        <!-- end content -->

    </div>
    <!-- end wrapper -->

    <!-- script -->
    {{-- feather icons --}}
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
    {{-- endFeather Icons --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- end script -->

</body>

</html>
