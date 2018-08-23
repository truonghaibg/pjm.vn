<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Công ty cổ phần PJM | Vật liệu xây dựng hoàn thiện | Gạch ốp lát | Đá ốp lát | Thế giới Mosaic | Keo dán, vữa ốp lát | Công cụ, dụng cụ ốp lát | Chống thấm và hóa chất | Nội Thất Vệ sinh và Bếp.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    
    <meta property="description" content="Công ty cổ phần PJM | Vật liệu xây dựng hoàn thiện | Gạch ốp lát | Đá ốp lát | Thế giới Mosaic | Keo dán, vữa ốp lát | Công cụ, dụng cụ ốp lát | Chống thấm và hóa chất | Nội Thất Vệ sinh và Bếp.">
    <meta name="description" content="Công ty cổ phần PJM | Vật liệu xây dựng hoàn thiện | Gạch ốp lát | Đá ốp lát | Thế giới Mosaic | Keo dán, vữa ốp lát | Công cụ, dụng cụ ốp lát | Chống thấm và hóa chất | Nội Thất Vệ sinh và Bếp.">
    <meta property="og:description" content="Công ty cổ phần PJM | Vật liệu xây dựng hoàn thiện | Gạch ốp lát | Đá ốp lát | Thế giới Mosaic | Keo dán, vữa ốp lát | Công cụ, dụng cụ ốp lát | Chống thấm và hóa chất | Nội Thất Vệ sinh và Bếp.">
    <meta property="robots" content="index,dofollow">
    <meta property="" content="pjm, people, job, money, pjm.vn">
	<?php if(isset($productview) && $productview!=''){   ?>
	<meta property="og:title" content="<?php echo $productview->product_name ?>">
    <meta property="og:image" content="{{url('/')}}/upload/product/<?php echo $productview->product_img; ?>">
	<?php } else { ?>
	<meta property="og:title" content="Công ty cổ phần PJM | Vật liệu xây dựng hoàn thiện | Gạch ốp lát | Đá ốp lát | Thế giới Mosaic | Keo dán, vữa ốp lát | Công cụ, dụng cụ ốp lát | Chống thấm và hóa chất | Nội Thất Vệ sinh và Bếp.">
    <meta property="og:image" content="{{url('/')}}/upload/slider/image_0.jpg">
	<?php } ?>
    <meta property="al:ios:url" content="">
    <meta property="al:android:url" content="">
    <meta property="al:android:class" content="">
    <meta name="author" content="pjm.vn">
    <meta name="copyright" content="pjm.vn">
    <meta property="og:type" content="website">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Import New -->
    <link rel="shortcut icon" href="{{url('template_asset/images/icon/favicon.ico')}}" />
    <script src="{{url('/')}}/template_asset/js/jquery.min.js"></script>
    <script src="{{url('/')}}/template_asset/js/jquery.nivo.slider.pack.js"></script>
    <script src="{{url('/')}}/template_asset/js/jquery.elevatezoom.js"></script>
    <script src="{{url('/')}}/template_asset/js/script.js"></script>
    <script src="{{url('/')}}/template_asset/js/menu.js"></script>
	
	<script src="{{url('/')}}/js/owl.carousel.js"></script>
	<script src="{{url('/')}}/js/owl.carousel.min.js"></script>
	<script src="{{url('/')}}/js/jquery-ui.min.js"></script>
	
    <script src="{{url('/')}}/template_asset/js/myscript.js"></script>
    <script src="{{url('/')}}/js/numeric/jquery.numeric.min.js"></script>
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
