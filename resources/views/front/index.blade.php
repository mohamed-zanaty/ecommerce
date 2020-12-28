@include('front.layouts.header')


    <!-- Navbar -->
@include('front.layouts.nav')
<!-- /.navbar -->

    @include('front.layouts.message')

    @yield('content')


    <!-- /.content-wrapper -->

@include('front.layouts.footer')

