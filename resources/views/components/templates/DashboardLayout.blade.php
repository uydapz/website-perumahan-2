<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title ?? '' }} | Dashboard</title>

    <!-- Icons & Fonts -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admassets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admassets/img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('admassets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admassets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Main CSS -->
    <link href="{{ asset('admassets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />

    <!-- DataTables Tailwind CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" rel="stylesheet" />

    <!-- Animate (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional JS & SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <style>
        a {
            text-decoration: none;
        }
    </style>

    <!-- Sidebar -->
    <x-Sidebaradm :title="$title" />

    <!-- Main Content -->
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <x-Navbaradm :title="$title ?? 'Dashboard'" />

        <!-- Page content slot -->
        {{ $slot }}

        <x-Footeradm />
    </main>

    <!-- jQuery (required by DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Chart.js -->
    <script src="{{ asset('admassets/js/plugins/chartjs.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('admassets/js/plugins/perfect-scrollbar.min.js') }}"></script>

    <!-- Argon Dashboard Main JS -->
    <script src="{{ asset('admassets/js/argon-dashboard-tailwind.js?v=1.0.1') }}"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>

    <!-- Page Specific Scripts (Slot) -->
    @isset($scripts)
        {{ $scripts }}
    @endisset
</body>

</html>
