<!DOCTYPE html>
<html lang="en">
    @include('includes.head')
<body>
    @include('includes.header')

    {{ $slot }}

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/isotope.min.js') }}"></script>
    <script src="{{ asset('js/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/counter.js') }} "></script>
    <script src="{{ asset('js/custom.js') }} "></script>
    @livewireScripts
</body>
</html>
