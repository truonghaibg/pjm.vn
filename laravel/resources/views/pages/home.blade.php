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

@endsection

@section('content')
    <!-- Slider -->
    @include('includes.slider')
    <!-- end Slider -->
    @include('includes.product-suggest')

    @include('includes.product-latest')

    @include('includes.product-seller')
    {{--@include('includes.product')--}}

@endsection
