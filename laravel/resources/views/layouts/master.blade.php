<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('includes.head')
</head>
<body class="cms-index-index">
    <div class="page">
        <!-- Header -->
        @include('includes.header')
        <!-- end header -->

        <!-- menu -->
        @include('includes.menu')
        <!-- end menu -->

        <!--End main-container -->
        @yield('content')
        <!--End main-container -->

        <!-- partner -->
        @include('includes.partner')
        <!-- End partner -->

        <!-- Footer -->
        @include('includes.footer')
        <!-- End Footer -->
       {{-- <script>
            $(document).ready(function() {
                showBannerDiv();
            })
        </script>
        <script src="https://www.cssscript.com/demo/animate-page-title-browser-tab/title-scroll.js" data-start="1000" data-speed="350"></script>--}}
    </div>
    <!-- other -->
    @include('includes.other')
    <!-- End other -->
</body>
</html>