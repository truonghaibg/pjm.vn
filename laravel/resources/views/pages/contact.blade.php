@extends('layout.index')
@section('content')
    <div id="aa-contact" class="contact-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-contact-area">
                        <div class="aa-contact-top">
                            <h2>Địa chỉ liên hệ</h2>
                        </div>
                        <!-- contact map -->
                        <div class="aa-contact-map">
                            <?php echo $siteConfig->google_map; ?>
                        </div>
                        <!-- Contact address -->
                        <div class="aa-contact-address">
                            <div class="row">
                                <div class="col-md-7">
                                    @if(session('thongbao'))
                                        <div class="alert alert-success">
                                            {{session('thongbao')}}
                                        </div>
                                    @endif
                                    <div class="aa-contact-address-left">
                                        <form class="comments-form contact-form" method="POST" action="{{url('lien-he')}}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Họ và tên" name="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" placeholder="Email" name="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Tiêu đề" name="title" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Điện thoại" name="mobile" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="3" placeholder="Nội dung" name="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="aa-secondary-btn" type="submit" name="submit">Gửi</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="aa-contact-address-right">
                                        <address>
                                            <?php echo $siteConfig->contact; ?>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection