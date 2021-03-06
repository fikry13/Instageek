<!DOCTYPE html>
<html>

@include('templates.partials.head')
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition {{ config('custom.skin')}} layout-top-nav">
    <div class="wrapper">

        @include('templates.partials.navbar')
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                {{--}}@include('templates.partials.content-header')--}}

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>

        @include('templates.partials.content-footer')

    </div>
    <!-- ./wrapper -->

    @include('templates.partials.scripts.main')
    @yield('script')

</body>

</html>