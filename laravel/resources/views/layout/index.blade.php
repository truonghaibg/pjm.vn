<!DOCTYPE html>
<html lang="vi">
<head>
    <title>PJM.VN - Công ty cổ phần PJM | Vật liệu xây dựng hoàn thiện | Gạch ốp lát | Đá ốp lát | Thế giới Mosaic | Keo dán, vữa ốp lát | Công cụ, dụng cụ ốp lát | Chống thấm và hóa chất | Nội Thất Vệ sinh và Bếp.</title>
    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no">

    
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="fb:app_id" content="1547540628876392">
	<?php if(isset($productview) && $productview!=''){   ?>
	<meta property="og:title" content="<?php echo $productview->product_name ?>"  />
    <meta property="og:image" content="{{url('/')}}/upload/product/<?php echo $productview->product_img; ?>" />
	<meta name="og:description" content="<?php echo $productview->meta_description ?>">
	<meta name="keywords" content="<?php echo $productview->meta_keywords ?>">
    <?php } elseif(isset($newview) && $newview!=''){  ?>
	<meta property="og:title" content="<?php echo $newview->title ?>" />
    <meta property="og:image" content="{{url('/')}}/upload/news/<?php echo $newview->img; ?>" />
	<meta name="og:description" content="<?php echo $newview->meta_description ?>">
	<meta name="description" content="<?php echo $newview->meta_description ?>">
	<meta name="keywords" content="<?php echo $newview->meta_keywords ?>">
	<?php } else { ?>
	<meta property="og:title" content="PJM.VN - Công ty cổ phần PJM" />
    <meta property="og:image" content="{{url('/')}}/upload/slider/CWCe_slai%207.jpg" />
	<meta name="description" content="Công ty cổ phần PJM | Vật liệu xây dựng hoàn thiện | Gạch ốp lát | Đá ốp lát | Thế giới Mosaic | Keo dán, vữa ốp lát | Công cụ, dụng cụ ốp lát | Chống thấm và hóa chất | Nội Thất Vệ sinh và Bếp.">
    <meta property="og:description" content="Chuyên cung cấp vật liệu xây dựng hoàn thiện, Gạch ốp lát, Đá ốp lá, Keo dán, vữa ốp lát, Công cụ, dụng cụ ốp lát, Chống thấm và hóa chất, Nội Thất Vệ sinh và Bếp...">
	<?php } ?>
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
	<script src="{{url('/')}}/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="{{url('/')}}/js/waterfall-light.js"></script>
    <script src="{{url('template_asset')}}/js/bootstrap.min.js"></script>
	
    <script src="{{url('/')}}/template_asset/js/myscript.js"></script>
    <script src="{{url('/')}}/js/numeric/jquery.numeric.min.js"></script>
    <link rel="stylesheet" href="{{url('template_asset/css')}}/style.css" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/owl.carousel.min.css" type="text/css" />
	<link rel="stylesheet" href="{{url('/')}}/owl.theme.default.min.css" type="text/css" />
    <link rel="stylesheet" href="{{url('/')}}/newstyle.css" type="text/css" />
    <link rel="stylesheet" href="{{url('template_asset/css/themes/default/default.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{url('template_asset/css/nivo-slider.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{url('/')}}/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="{{url('template_asset')}}/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	@yield('css')

</head>
<body>
@include('layout.banner')
<div id="fb-root"></div>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125260006-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-125260006-1');
</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    @include('layout.header')
    @include('layout.menu')
    @include('layout.slider')

  	@yield('content')
  	@include('layout.footer')
  	('script')
	<script>
		$(document).ready(function() {
			showBannerDiv();
		})
	</script>
	<script src="https://www.cssscript.com/demo/animate-page-title-browser-tab/title-scroll.js" data-start="1000" data-speed="350"></script>
	

</body>
</html>
