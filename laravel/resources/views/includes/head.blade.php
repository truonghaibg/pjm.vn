<title>PJM.VN - Công ty cổ phần PJM | Vật liệu xây dựng hoàn thiện | Gạch ốp lát | Đá ốp lát | Thế giới Mosaic | Keo dán, vữa ốp lát | Công cụ, dụng cụ ốp lát | Chống thấm và hóa chất | Nội Thất Vệ sinh và Bếp.</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no">

<meta property="og:url" content="{{ url()->current() }}">
<meta property="fb:app_id" content="1547540628876392">
<?php if(isset($productview) && $productview!=''){   ?>
<meta property="og:title" content="<?php echo $productview->title ?>"  />
<meta property="og:image" content="{{url($productview->image)}}"/>
<meta name="og:description" content="<?php echo $productview->meta_description ?>">
<meta name="keywords" content="<?php echo $productview->meta_keywords ?>">
<?php } elseif(isset($newview) && $newview!=''){  ?>
<meta property="og:title" content="<?php echo $newview->title ?>" />
<meta property="og:image" content="{{url($newview->image)}}" />
<meta name="og:description" content="<?php echo $newview->meta_description ?>">
<meta name="description" content="<?php echo $newview->meta_description ?>">
<meta name="keywords" content="<?php echo $newview->meta_keywords ?>">
<?php } else { ?>
<meta property="og:title" content="{{$siteConfig->desc_short}}" />
<meta property="og:image" content="{{url($siteConfig->image_default)}}" />
<meta name="description" content="Công ty cổ phần PJM | Vật liệu xây dựng hoàn thiện | Gạch ốp lát | Đá ốp lát | Thế giới Mosaic | Keo dán, vữa ốp lát | Công cụ, dụng cụ ốp lát | Chống thấm và hóa chất | Nội Thất Vệ sinh và Bếp.">
<meta property="og:description" content="Chuyên cung cấp vật liệu xây dựng hoàn thiện, Gạch ốp lát, Đá ốp lá, Keo dán, vữa ốp lát, Công cụ, dụng cụ ốp lát, Chống thấm và hóa chất, Nội Thất Vệ sinh và Bếp...">
<?php } ?>
<meta name="author" content="pjm.vn">
<meta name="copyright" content="pjm.vn">
<meta property="og:type" content="website">

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1">

{{--Boostrap 4.3.1--}}
<script src="{{url('template_asset/bootstrap-4.3.1/js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{url('template_asset/bootstrap-4.3.1/css/bootstrap.min.css')}}" type="text/css" />

<!-- Import New -->
<link rel="shortcut icon" href="{{url($siteConfig->favicon)}}" />
<script src="{{url('template_asset/js/jquery.min.js')}}"></script>
<script src="{{url('template_asset/js/jquery.nivo.slider.pack.js')}}"></script>
<script src="{{url('template_asset/js/jquery.elevatezoom.js')}}"></script>
<script src="{{url('template_asset/js/script.js')}}"></script>
<script src="{{url('template_asset/js/menu.js')}}"></script>
<script type="text/javascript" src="{{url('template_asset/js/slider.js')}}"></script>

<script src="{{url('js/owl.carousel.min.js')}}"></script>
<script src="{{url('js/jquery-ui.min.js')}}"></script>
<script src="{{url('js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{url('js/waterfall-light.js')}}"></script>
<link rel="stylesheet" href="{{url('template_asset/css/owl.carousel.css')}}" type="text/css">

<script src="{{url('template_asset/js/myscript.js')}}"></script>
<script src="{{url('js/numeric/jquery.numeric.min.js')}}"></script>
<link rel="stylesheet" href="{{url('template_asset/css/style.css')}}" type="text/css" />
<link rel="stylesheet" href="{{url('owl.carousel.min.css')}}" type="text/css" />
<link rel="stylesheet" href="{{url('owl.theme.default.min.css')}}" type="text/css" />
<link rel="stylesheet" href="{{url('newstyle.css')}}" type="text/css" />
<link rel="stylesheet" href="{{url('template_asset/css/themes/default/default.css')}}" type="text/css" />
<link rel="stylesheet" href="{{url('template_asset/css/nivo-slider.css')}}" type="text/css" />
<link rel="stylesheet" href="{{url('jquery-ui.min.css')}}" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script type="text/javascript">
    //<![CDATA[
    jQuery(function() {
        jQuery(".slideshow").cycle({
            fx: 'scrollHorz', easing: 'easeInOutCubic', timeout: 10000, speedOut: 800, speedIn: 800, sync: 1, pause: 1, fit: 0, 			pager: '#home-slides-pager',
            prev: '#home-slides-prev',
            next: '#home-slides-next'
        });
    });
    //]]>
</script>

@yield('head')