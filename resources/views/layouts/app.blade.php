<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Styles -->
    @vite(['resources/scss/index.scss'])
</head>

<body>

    @include('partials.sidebar.sidebar')

    <div class="main-content d-flex flex-column align-items-stretch" id="panel" style="min-height: 100vh">

        @include('partials.navbar')

        <div class="w-100 px-2" style="position: absolute; top: 80px; z-index: 100">
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Operación Éxitosa!</strong> {{ Session::get('success') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>

        @yield('header')


        <main class="container-fluid mt--6 d-flex flex-column align-items-stretch flex-grow-1">
            <div class="flex-grow-1">
                @yield('main')
            </div>

            @include('partials.footer')
        </main>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/@creative-tim-official/argon-dashboard-free@1.2.0/assets/vendor/jquery/dist/jquery.min.js">
    </script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@creative-tim-official/argon-dashboard-free@1.2.0/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js">
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/@creative-tim-official/argon-dashboard-free@1.2.0/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    @vite(['resources/js/index.js'])
    <script src="https://cdn.jsdelivr.net/npm/@creative-tim-official/argon-dashboard-free@1.1.0/assets/js/argon.min.js">
    </script>
    @stack('scripts')
</body>

</html>