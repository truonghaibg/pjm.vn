@extends('layouts.master')
@section('content')
    <section class="content-wrapper">
        <div class="container">
            <div class="std">
                <div class="page-not-found wow bounceInRight animated">
                    <h2>404</h2>
                    <h3><img src="{{url('images/signal.png')}}" alt="signal_img">Oops! The Page you requested was not found!</h3>
                    <div><a href="{{url('')}}" class="btn-home"><span>Back To Home</span></a></div>
                </div>
            </div>
        </div>
    </section>
@endsection