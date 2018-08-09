@extends('layout.index')
@section('content')
<div class="page3">
  <h1>Cảm ơn quý khách đã đặt hàng</h1>
  <p>Đơn hàng của quý khách đã được gửi thành công. Bộ phận chăm sóc khách hàng của website sẽ liên hệ lại với quý khách thông qua đơn hàng để có hướng dẫn thêm.<br>Cảm ơn quý khách !</p>

	@if(session('donhang'))
        {{session('donhang')}}
        <a href="{{url('export-order/'.session('donhang'))}}" target="_blank">Tải về đơn hàng</a>
    @endif

  
</div>
<div style="clear: both;"></div>
@endsection
