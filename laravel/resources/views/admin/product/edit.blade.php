@extends('admin.layout.index')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        {{$title}}<small> Sửa</small>
                    </h1>
                </div>
                <div class="col-lg-12" style="padding-bottom:120px">
                    <form action="{{url($update_route, $item->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                                    <label>ID</label>
                                    <input class="form-control" name="id" value="{{$item->id}}" readonly/>
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
                                    <label>Chuyên mục</label>
                                    <select class="form-control" name="subcate_id" id="subcate_id">
                                        @foreach($proSubcates as $sub)
                                            <option value="{{$sub->id}}">{{$sub->title}}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        $("select[name='subcate_id']").val({{$item->subcate_id}});
                                    </script>
                                    <div class="text-block">
                                        @if($errors->has('subcate_id'))
                                            <p style="color:red">{{$errors->first('subcate_id')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Hãng</label>
                                    <select class="form-control" name="maker_id" id="maker_id">
                                        @foreach($proMakers as $tem)
                                            <option value="{{$tem->id}}">{{$tem->title}}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        $("select[name='maker_id']").val({{$item->nsx_id}});
                                    </script>
                                    <div class="text-block">
                                        @if($errors->has('proMaker'))
                                            <p style="color:red">{{$errors->first('proMaker')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Sản phẩm đề xuất</label>
                                    <input class="form-control" name="is_suggest" value="{{$item->is_suggest}}"/>
                                    <div class="text-block">
                                        @if($errors->has('is_suggest'))
                                            <p style="color:red">{{$errors->first('is_suggest')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Sản phẩm mới</label>
                                    <input class="form-control" name="is_new" value="{{$item->is_new}}"/>
                                    <div class="text-block">
                                        @if($errors->has('is_new'))
                                            <p style="color:red">{{$errors->first('is_new')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Sản phẩm bán chạy</label>
                                    <input class="form-control" name="is_sale" value="{{$item->is_sale}}"/>
                                    <div class="text-block">
                                        @if($errors->has('is_sale'))
                                            <p style="color:red">{{$errors->first('is_sale')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input class="form-control" name="title" value="{{$item->title}}"/>
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
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" value="{{$item->slug}}" readonly/>
                                    <div class="text-block">
                                        @if($errors->has('slug'))
                                            <p style="color:red">{{$errors->first('slug')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Model sản phẩm</label>
                                    <input class="form-control" name="product_model" value="{{$item->product_model}}"/>
                                    <div class="text-block">
                                        @if($errors->has('product_model'))
                                            <p style="color:red">{{$errors->first('product_model')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Tag sản phẩm</label>
                                    <input class="form-control" name="product_tag" value="{{$item->product_tag}}"/>
                                    <div class="text-block">
                                        @if($errors->has('product_tag'))
                                            <p style="color:red">{{$errors->first('product_tag')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <input class="form-control" name="status" value="{{$item->status}}"/>
                                    <div class="text-block">
                                        @if($errors->has('status'))
                                            <p style="color:red">{{$errors->first('status')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input class="form-control" name="price" value="{{$item->price}}"/>
                                    <div class="text-block">
                                        @if($errors->has('price'))
                                            <p style="color:red">{{$errors->first('price')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Phần trăm giảm giá</label>
                                    <input class="form-control" name="product_salevalue" value="{{$item->product_salevalue}}"/>
                                    <div class="text-block">
                                        @if($errors->has('product_salevalue'))
                                            <p style="color:red">{{$errors->first('product_salevalue')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    @if(!is_null($item->image))
                                        <img style="width: 200px" src="{{url($item->image)}}" />
                                    @endif
                                    <input class="form-control" type="file" name="image" value="{{$item->image}}"/>
                                    <div class="text-block">
                                        @if($errors->has('image'))
                                            <p style="color:red">{{$errors->first('image')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    @if(!is_null($item->image01))
                                        <img style="width: 200px" src="{{url($item->image01)}}" />
                                    @endif
                                    <input class="form-control" type="file" name="image01" value="{{$item->image01}}"/>
                                    <div class="text-block">
                                        @if($errors->has('image01'))
                                            <p style="color:red">{{$errors->first('image01')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    @if(!is_null($item->image02))
                                        <img style="width: 200px" src="{{url($item->image02)}}" />
                                    @endif
                                    <input class="form-control" type="file" name="image02" value="{{$item->image02}}"/>
                                    <div class="text-block">
                                        @if($errors->has('image02'))
                                            <p style="color:red">{{$errors->first('image02')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    @if(!is_null($item->image03))
                                        <img style="width: 200px" src="{{url($item->image03)}}" />
                                    @endif
                                    <input class="form-control" type="file" name="image03" value="{{$item->image03}}"/>
                                    <div class="text-block">
                                        @if($errors->has('image03'))
                                            <p style="color:red">{{$errors->first('image03')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    @if(!is_null($item->image04))
                                        <img style="width: 200px" src="{{url($item->image04)}}" />
                                    @endif
                                    <input class="form-control" type="file" name="image04" value="{{$item->image04}}"/>
                                    <div class="text-block">
                                        @if($errors->has('image04'))
                                            <p style="color:red">{{$errors->first('image04')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Thông tin mô tả</label>
                                    <textarea class="form-control summernote" rows="3" name="desc_short">{{$item->desc_short}}</textarea>
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
                                    <label>Thông tin sản phẩm</label>
                                    <textarea class="form-control summernote" rows="5" name="desc_long">{{$item->desc_long}}</textarea>
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
                                    <label class="control-label">Meta keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" value="{{$item->meta_keywords}}">
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
                                    <input type="text" class="form-control" name="meta_description" value="{{$item->meta_description}}">
                                    <div class="text-block">
                                        @if($errors->has('meta_description'))
                                            <p style="color:red">{{$errors->first('meta_description')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
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
                        </div>
                        <div class="row">
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
                                    <a href="{{url($back_route)}}" class="btn btn-default">Quay lại</a>
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
