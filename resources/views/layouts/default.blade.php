<!DOCTYPE html>
<html>

<head>

    @include('includes.frontsite.meta')

    <title>@yield('title') | MeetDoctor</title>

    @stack('before-style')
    @include('includes.frontsite.style')
    @stack('after-style')

</head>

<body>

    @include('sweetalert::alert')

    @include('components.frontsite.header')
    @yield('content')

    @stack('before-script')
    @include('includes.frontsite.script')
    @stack('after-script')

    {{-- modals --}}
    {{-- if you have modal, create here --}}
</body>

</html>