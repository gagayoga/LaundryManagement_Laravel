<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - LaundryXpert</title>

    {{-- Link favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.svg') }}" type="image/x-icon">
    {{-- Link Flowbite CSS and Javascript --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

    @yield('style')
    {{-- end link css & js flowbite --}}
</head>

<body>

    {{-- bagian header --}}
    @include('layouts.header')

    {{-- bagian sidebar --}}
    @include('layouts.sidebar')

    <main>
        {{-- bagian contents --}}
        @yield('contents')
    </main>

    @yield('modals')

    @yield('script')
</body>

</html>
