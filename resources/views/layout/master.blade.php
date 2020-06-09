<!DOCTYPE html>
<html lang="en">
    <!-- head -->
@include('layout/head')
@yield('head')
<body>
    <div id="page">
    <!--header-->

    @include('layout/header')
   @include('layout/nav')
    @yield('content')
    <!-- footer -->
    @include('layout/footer')
    </div>
     <!-- scripts -->
     @include('layout/script')
     @yield('script')
</body>
</html>