@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-header">
                        {{$title}}<small> Cập nhật</small>
                    </h1>
                </div>
                <div class="col-12">
                    <form id="service-id" action="{{url($update_route, $item->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Cập nhật</button>
                                    <button type="reset" class="btn btn-default">Làm mới</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <input id="id-id" type="text" class="form-control" name="id" value="{{$item->id}}" readonly>
                                    <div class="text-block">
                                        @if($errors->has('id'))
                                            <p style="color:red">{{$errors->first('id')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Tiêu đề</label>
                                    <input id="title-id" type="text" class="form-control" name="title" value="{{$item->title}}">
                                    <div class="text-block">
                                        @if($errors->has('title'))
                                            <p style="color:red">{{$errors->first('title')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Link</label>
                                    <input id="link-id" type="text" class="form-control" name="link" value="{{$item->link}}">
                                    <div class="text-block">
                                        @if($errors->has('link'))
                                            <p style="color:red">{{$errors->first('link')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Logo</label>
                                    @if(!is_null($item->logo))
                                        <img style="width: 200px" src="{{url($item->logo)}}" />
                                    @endif
                                    <input class="form-control" type="file" name="logo" />
                                    <div class="text-block">
                                        @if($errors->has('logo'))
                                            <p style="color:red">{{$errors->first('logo')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Favicon</label>
                                    @if(!is_null($item->favicon))
                                        <img style="width: 200px" src="{{url($item->favicon)}}" />
                                    @endif
                                    <input class="form-control" type="file" name="favicon" />
                                    <div class="text-block">
                                        @if($errors->has('favicon'))
                                            <p style="color:red">{{$errors->first('favicon')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Ảnh mặc định</label>
                                    @if(!is_null($item->image_default))
                                        <img style="width: 200px" src="{{url($item->image_default)}}" />
                                    @endif
                                    <input class="form-control" type="file" name="image_default" />
                                    <div class="text-block">
                                        @if($errors->has('image_default'))
                                            <p style="color:red">{{$errors->first('image_default')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Slogan</label>
                                    <input type="text" class="form-control" value="{{$item->slogan}}" name="slogan">
                                    <div class="text-block">
                                        @if($errors->has('slogan'))
                                            <p style="color:red">{{$errors->first('slogan')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Mô tả ngắn</label>
                                    <input type="text" class="form-control" value="{{$item->desc_short}}" name="desc_short">
                                    <div class="text-block">
                                        @if($errors->has('desc_short'))
                                            <p style="color:red">{{$errors->first('desc_short')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Mô tả dài</label>
                                    <input type="text" class="form-control" value="{{$item->desc_long}}" name="desc_long">
                                    <div class="text-block">
                                        @if($errors->has('desc_long'))
                                            <p style="color:red">{{$errors->first('desc_long')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Footer</label>
                                    <textarea class="form-control summernote" rows="5" name="footer">{{$item->footer}}</textarea>
                                    <div class="text-block">
                                        @if($errors->has('footer'))
                                            <p style="color:red">{{$errors->first('footer')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Google SEO</label>
                                    <textarea class="form-control" rows="5" name="google_seo">{{$item->google_seo}}</textarea>
                                    <div class="text-block">
                                        @if($errors->has('google_seo'))
                                            <p style="color:red">{{$errors->first('google_seo')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label" data-toggle="tooltip" title="Chỉnh lại thông số width='100%' height='450'">Google Map</label>
                                    <textarea class="form-control" rows="5" name="google_map">{{$item->google_map}}</textarea>
                                    <div class="text-block">
                                        @if($errors->has('google_map'))
                                            <p style="color:red">{{$errors->first('google_map')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Địa chỉ</label>
                                    <input type="text" class="form-control" value="{{$item->address}}" name="address">
                                    <div class="text-block">
                                        @if($errors->has('address'))
                                            <p style="color:red">{{$errors->first('address')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Điện thoại</label>
                                    <input type="text" class="form-control" value="{{$item->mobile}}" name="mobile">
                                    <div class="text-block">
                                        @if($errors->has('mobile'))
                                            <p style="color:red">{{$errors->first('mobile')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" class="form-control" value="{{$item->email}}" name="email">
                                    <div class="text-block">
                                        @if($errors->has('email'))
                                            <p style="color:red">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Facebook</label>
                                    <input type="text" class="form-control" value="{{$item->facebook}}" name="facebook">
                                    <div class="text-block">
                                        @if($errors->has('facebook'))
                                            <p style="color:red">{{$errors->first('facebook')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Facebook Page</label>
                                    <textarea class="form-control" rows="5" name="facebook_box">{{$item->facebook_box}}</textarea>
                                    <div class="text-block">
                                        @if($errors->has('facebook_box'))
                                            <p style="color:red">{{$errors->first('facebook_box')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Twitter</label>
                                    <input type="text" class="form-control" value="{{$item->twitter}}" name="twitter">
                                    <div class="text-block">
                                        @if($errors->has('twitter'))
                                            <p style="color:red">{{$errors->first('twitter')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Meta keywords</label>
                                    <input type="text" class="form-control" value="{{$item->meta_keywords}}" name="meta_keywords">
                                    <div class="text-block">
                                        @if($errors->has('meta_keywords'))
                                            <p style="color:red">{{$errors->first('meta_keywords')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Meta description</label>
                                    <input type="text" class="form-control" value="{{$item->meta_description}}" name="meta_description">
                                    <div class="text-block">
                                        @if($errors->has('meta_description'))
                                            <p style="color:red">{{$errors->first('meta_description')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Ngày tạo</label>
                                    <input type="text" class="form-control" name="created_at" value="{{$item->created_at}}" readonly>
                                    <div class="text-block">
                                        @if($errors->has('created_at'))
                                            <p style="color:red">{{$errors->first('created_at')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Ngày cập nhật</label>
                                    <input type="text" class="form-control" name="updated_at" value="{{$item->updated_at}}" readonly>
                                    <div class="text-block">
                                        @if($errors->has('updated_at'))
                                            <p style="color:red">{{$errors->first('updated_at')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Cập nhật</button>
                                    <button type="reset" class="btn btn-default">Làm mới</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection