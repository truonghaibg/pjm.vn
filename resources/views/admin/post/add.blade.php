@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài viết
                    <small>Thêm mới</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
                <form action="admin/post/add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="cate_id" id="cate_id">
                        @foreach($cate as $ct)
                            <option value="{{$ct->id}}">{{$ct->cate_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="subcate_id" id="subcate_id">
                        @foreach($subcate as $sc)
                            <option value="{{$sc->id}}">{{$sc->subcate_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề bài viết</label>
                        <input class="form-control" name="post_title" placeholder="Điền Tiêu đề bài viết" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh bài viết</label>
                        <input class="form-control" type="file" name="post_img" />
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt bài viết</label>
                        <textarea class="form-control" name="post_sum"></textarea>
                    </div>
                    <!-- <script>tinymce.init({
                      selector: '#tinymce',
                      height: 500,
                      plugins: [
                            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
                          ],

                          toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
                          toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
                          toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

                          menubar: false,
                          toolbar_items_size: 'small',

                          style_formats: [{
                            title: 'Bold text',
                            inline: 'b'
                          }, {
                            title: 'Red text',
                            inline: 'span',
                            styles: {
                              color: '#ff0000'
                            }
                          }, {
                            title: 'Red header',
                            block: 'h1',
                            styles: {
                              color: '#ff0000'
                            }
                          }, {
                            title: 'Example 1',
                            inline: 'span',
                            classes: 'example1'
                          }, {
                            title: 'Example 2',
                            inline: 'span',
                            classes: 'example2'
                          }, {
                            title: 'Table styles'
                          }, {
                            title: 'Table row 1',
                            selector: 'tr',
                            classes: 'tablerow1'
                          }],

                          templates: [{
                            title: 'Test template 1',
                            content: 'Test 1'
                          }, {
                            title: 'Test template 2',
                            content: 'Test 2'
                          }],
                          content_css: [
                            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                            '//www.tinymce.com/css/codepen.min.css'
                          ]
                        });
                    </script> -->
                    <div class="form-group">
                        <label>Nội dung bài viết</label>
                        <textarea class="form-control summernote" rows="5" name="post_content"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Bài viết được chứ ý không?</label>
                        <label class="radio-inline">
                            <input name="post_high" value="0" checked="" type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input name="post_high" value="1" type="radio">Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm mới</button>
                    <button type="reset" class="btn btn-default">Viết lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#cate_id").change(function(){
                var cate_id = $(this).val();
                $.get("admin/ajax/subcate/"+cate_id,function(data){
                    $("#subcate_id").html(data);
                });
            });
            $('.summernote').summernote();
        });
    </script>
@endsection
