@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-main col-md-9 col-xs-12 wow bounceInUp animated">
                <div class="page-title">
                    <h2>Liên hệ</h2>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md d-md-block d-none">
                        <?php echo $siteConfig->google_map; ?>
                    </div>
                </div>
                <div>
                    @if(session('info'))
                        <div class="alert alert-info">
                            {{session('info')}}
                        </div>
                    @endif
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    <form  action="{{url('lien-he')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset class="group-select">
                            <ul>
                                <li>
                                    <div class="form-group">
                                        <label for="title">Tiêu đề<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group">
                                        <label for="email">Email<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Số điện thoại<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="mobile" name="mobile">
                                    </div>
                                </li>
                                <li class="">
                                    <div class="form-group">
                                        <label for="description">Nội dung<span class="required">*</span></label>
                                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                    </div>
                                </li>
                                <li> <p class="require"><em class="required">* </em>Thông tin bắt buộc</p>
                                    <div class="buttons-set">
                                        <button type="submit" class="btn btn-primary">Gửi đi</button>
                                    </div>
                                </li>
                            </ul>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="box_left">
                    <div class="title_box_left">Danh mục bài viết</div>
                    <div class="content_box_left list_cat_news">
                        <ul class="ul">
                            @foreach($posts as $item)
                                <li class="item"><a href="{{url('bai-viet', $item->slug)}}" title="{{$item->title}}">{{$item->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection