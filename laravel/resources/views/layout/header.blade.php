<div class="top-nav-wrap">
    <div class="container top-nav">
        <div class="row no-gutters">
            <div class="col pull-left">
                <div class="nav-left">
                    <ul class="nav nav-pills nav-stacked menu">
                        <li>Chào mừng đến với PJM.VN</li>
                    </ul>
                </div>
            </div>
            <div class="col pull-right">
                <div class="nav-right topbar-right text-right">
                    <ul class="nav nav-pills nav-stacked menu">
                        <li>
                            <?php
                            $result = count(Cart::content());
                            ?>
                            <a class="mycart" href="{{url('gio-hang')}}">
                                Giỏ hàng <span style="color: red">(<?php echo $result; ?>)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-wrap">
    <div class="container header">
        <div class="row">
            <div class="col-md-3 col-sm-12 text-center">
                <div class="main-logo">
                    <a href="{{url('')}}">
                        <img src="{{url('upload/site', $siteConfig->logo)}}" title="{{$siteConfig->title}}"
                             alt="{{$siteConfig->title}}">
                    </a>

                </div>
            </div>
            <div class="col-md-6 col-sm-12 pull-left" style="margin: auto">
               
                    <div class="input-group center-block">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
						<input type="hidden" name="current" value="1" />
                        <input type="text" id="key-search" value="" class="form-control border-2 border-danger"  name="search" placeholder="Nhập tên hoặc mã sản phẩm tìm kiếm...">
                        <div class="input-group-append">
                            <button onclick="StartSearch()"  class="btn btn-danger" title="Tìm kiếm" name="Tìm kiếm">Tìm kiếm</button>
                        </div>
						<script>
							function StartSearch() {
								var key =  jQuery("#key-search").val();
								window.location.replace("<?php echo url('/') ?>/tim-kiem/"+encodeURI(key));
							}
						</script>
                    </div>
                
            </div>
            <div class="col-md-3 d-none d-md-block">
                <div class="header-right">
                    <img width="85%" src="{{url('')}}/template_asset/images/logo/hotline.png" title="" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear: both;"></div>
