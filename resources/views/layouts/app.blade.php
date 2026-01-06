<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Project Management System')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<style>
    .hover-link:hover {
        background-color: #495057;
        padding-left: 1.25rem;
        transition: all 0.3s ease;
    }
</style>

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('partials.header')

    <div class="container-fluid">
        <div class="row h-100">

            <aside class="col-md-3 col-lg-2 bg-dark text-light p-3">
                <div class="position-sticky top-0">
                    @include('partials.sidebar')
                </div>
            </aside>

            <div class="col-md-9 col-lg-10 p-4">
                <main class="bg-white rounded-4 shadow-sm p-4">
                    <x-alert />
                    @yield('content')
                </main>
            </div>

        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
