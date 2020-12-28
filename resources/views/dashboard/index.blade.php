@include('dashboard.layouts.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
@include('dashboard.layouts.nav')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('dashboard.layouts.sidebar')
<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
    @include('dashboard.layouts.message')

    @yield('content')

    </div>
    <!-- /.content-wrapper -->

@include('dashboard.layouts.footer')

