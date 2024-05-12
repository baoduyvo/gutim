<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('Client.partials.head')

</head>

<body>
    @include('Client.partials.header')

    @if (Route::currentRouteName() == 'client.home.index')
        @include('Client.partials.slider')
    @else
        @include('client.partials.banner')
    @endif

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Wow...",
                text: "{{ Session::get('success') }}",
                icon: "success",
                timer: 2500
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: "Sorry...",
                text: "{{ Session::get('error') }}",
                icon: "error",
                timer: 2500
            });
        </script>
    @endif

    @yield('content')

    @include('Client.partials.footer')

    @include('Client.partials.foot')
</body>

</html>
