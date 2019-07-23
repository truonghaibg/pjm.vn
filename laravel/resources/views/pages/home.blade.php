@extends('layouts.master')

@section('head')
    <title>{{$siteConfig->title}} - {{$siteConfig->meta_description}}</title>
    <meta property="og:title" content="{{$siteConfig->title}}"/>
    @if(!isset($siteConfig->image_default))
        <meta property="og:image" content="{{url($siteConfig->image_default)}}"/>
    @endif
    <meta property="og:description" content="{{$siteConfig->meta_description}}">
    <meta name="description" content="{{$siteConfig->meta_description}}">
    <meta name="keywords" content="{{$siteConfig->meta_keywords}}"/>

    <style>
        .menu-wrap .menu-dropdown #navId {
            display : block !important;
            position: relative !important;
        }
        @media (max-width: 768px) {
            .menu-wrap .menu-dropdown #navId {
                position: absolute !important;
                z-index:999; width: 100%;
                border: 1px solid #ebebeb;
                background: #fff;
            }
        }
    </style>
    <script>
        jQuery(document).ready(function () {
            if (jQuery(window).width() < 768 ){
                jQuery('h3.module-title').click( function () {
                    if(jQuery(".module-ct .nav").hasClass("show")) {
                        jQuery(".module-ct .nav").removeClass("show");
                    }  	else {
                        jQuery(".module-ct .nav").addClass("show");
                    }
                });
            }
        });
    </script>
@endsection

@section('content')
    <!-- Slider -->
    @include('includes.slider')
    <!-- end Slider -->
    @include('includes.product-suggest')

    @include('includes.product-latest')

    @include('includes.product-seller')

@endsection
