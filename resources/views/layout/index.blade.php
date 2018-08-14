<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PROJECT 2017">
    <meta name="author" content="">
    <title>Ngọc Cường Computer</title>
    <base href="{{asset('')}}">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Import New -->
    <link rel="shortcut icon" href="{{url('template_asset/images/icon/favicon.ico')}}" />
    <script src="template_asset/js/jquery.min.js"></script>
    <script src="template_asset/js/jquery.nivo.slider.pack.js"></script>
    <script src="template_asset/js/jquery.elevatezoom.js"></script>
    <script src="template_asset/js/script.js"></script>
    <script src="template_asset/js/menu.js"></script>
	
	<script src="{{url('/')}}/js/owl.carousel.js"></script>
	<script src="{{url('/')}}/js/owl.carousel.min.js"></script>
	<script src="{{url('/')}}/js/jquery-ui.min.js"></script>
	
	
	
    <script src="template_asset/js/myscript.js"></script>
    <script src="js/numeric/jquery.numeric.min.js"></script>
    <link rel="stylesheet" href="{{url('template_asset/css/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/owl.carousel.min.css" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/owl.theme.default.min.css" type="text/css" />
    <link rel="stylesheet" href="{{url('/')}}/newstyle.css" type="text/css" />
    <link rel="stylesheet" href="{{url('template_asset/css/themes/default/default.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{url('template_asset/css/nivo-slider.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{url('/')}}/jquery-ui.min.css" type="text/css" />


    <!-- Import New -->



	@yield('css')

</head>
<body>

    @include('layout.header')
    @include('layout.menu')

  	@yield('content')
  	@include('layout.footer')
  	@yield('script')


</body>
</html>
