<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?? config('app.name') }} - Inventory</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    {{-- https://fontawesome.com/v4/icons/ --}}
    {{-- css&library --}}
    @include('layout.admin.head')
    {{-- css&library --}}
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        {{-- sidebar --}}
        @include('layout.admin.sidebar')
        {{-- sidebar --}}


        <div class="content">
            {{-- navbar --}}
            @include('layout.admin.navbar-top')
            {{-- navbar --}}
            {{-- isi content --}}
            @yield('content')
            {{-- isi content --}}
            {{-- footer --}}
            @include('layout.admin.footer')
            {{-- footer --}}
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    {{-- script js&library --}}
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @include('layout.admin.script')
    {{-- script js&library --}}
</body>

</html>
