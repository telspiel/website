<!doctype html>
<html lang="en" data-bs-theme="light">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Telspiel @yield('title')</title>
        <!--favicon-->
        <link rel="icon" href="{{ asset('assets/images/icon.png') }}" type="image/png">
        @include('admin.layout.css')
        @yield('css')


    </head>

    <body>


        @include('admin.layout.header')
        @include('admin.layout.sidebar')

        @yield('content')


        <!--start footer-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © {{ date('Y') }}. All right reserved.</p>
        </footer>
        <!--end footer-->

        @include('admin.layout.js')
        <script>
            @if (session()->has('success'))
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
            @if (session()->has('warning'))
                Swal.fire({
                    title: "{{ session('warning') }}",
                    icon: "warning",
                    draggable: true
                });
            @endif
            @if (session()->has('info'))
                Swal.fire({
                    title: "{{ session('info') }}",
                    icon: "info",
                    draggable: true
                });
            @endif
            @if (session()->has('error'))
                Swal.fire({
                    title: "{{ session('error') }}",
                    icon: "error",
                    draggable: true
                });
            @endif
            var er = {!! $errors !!};


            if (er.length !== 0) {
                var list = "";
                $.each(er, function(i, errors) {
                    $.each(errors, function(i, error) {
                        list = list + `<li>${error}</li>`;

                    });
                });
                Swal.fire({
                    title: `<ul>${list}</ul>`,
                    icon: "error",
                    draggable: true
                });
                // console.log(list);

            }
        </script>
        @yield('js')

    </body>

</html>
