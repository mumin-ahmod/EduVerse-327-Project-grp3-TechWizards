@include('frontend.includes.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        @include('frontend.includes.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                @include('frontend.includes.navbar')


                @yield('content')




            </div>
            <!-- End of Main Content -->



            @include('frontend.includes.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    @include('frontend.includes.script')
</body>

</html>
