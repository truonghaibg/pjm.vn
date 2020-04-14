<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no">

<meta property="og:url" content="{{ url()->current() }}">
<meta property="fb:app_id" content="1547540628876392">
<meta name="author" content="{{$siteConfig->link}}">
<meta name="copyright" content="{{$siteConfig->link}}">
<meta property="og:type" content="website">
<link rel="shortcut icon" href="{{url($siteConfig->favicon)}}" />

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1">

{{--CSS--}}
<link rel="stylesheet" href="{{url('template/bootstrap-4.3.1/css/bootstrap.min.css')}}" type="text/css" />
<link rel="stylesheet" href="{{url('template_asset/css/owl.carousel.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('template_asset/css/style.css')}}" type="text/css" />
{{--<link rel="stylesheet" href="{{url('owl.theme.default.min.css')}}" type="text/css" />--}}
<link rel="stylesheet" href="{{url('newstyle.css')}}" type="text/css" />
{{--<link rel="stylesheet" href="{{url('template_asset/css/themes/default/default.css')}}" type="text/css" />--}}
{{--<link rel="stylesheet" href="{{url('template_asset/css/nivo-slider.css')}}" type="text/css" />--}}
{{--<link rel="stylesheet" href="{{url('jquery-ui.min.css')}}" type="text/css" />--}}
{{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">--}}

{{--JS--}}
<script type="text/javascript" src="{{url('template/js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('template/bootstrap-4.3.1/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('template/js/lazyload.js')}}"></script>
{{--<script type="text/javascript" src="{{url('template_asset/js/jquery.nivo.slider.pack.js')}}" async></script>--}}
{{--<script type="text/javascript" src="{{url('template_asset/js/jquery.elevatezoom.js')}}" async></script>--}}
{{--<script type="text/javascript" src="{{url('template_asset/js/script.js')}}" async></script>--}}
{{--<script type="text/javascript" src="{{url('template_asset/js/menu.js')}}" async></script>--}}
{{--<script type="text/javascript" src="{{url('template_asset/js/slider.js')}}" async></script>--}}
{{--<script type="text/javascript" src="{{url('js/owl.carousel.min.js')}}" async></script>--}}
{{--<script type="text/javascript" src="{{url('js/jquery-migrate-1.2.1.min.js')}}" async></script>--}}
{{--<script type="text/javascript" src="{{url('js/waterfall-light.js')}}" async></script>--}}
{{--<script type="text/javascript" src="{{url('js/numeric/jquery.numeric.min.js')}}" async></script>--}}

<!-- Google Tag Manager -->
<script>
    window.addEventListener("load", function(event) {
        lazyload();
    });
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NS62JKR');
</script>
<!-- End Google Tag Manager -->
@yield('head')