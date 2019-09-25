<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PJM.VN">
    <meta name="author" content="website">
    <title>PJM COMPANY</title>
    <link href="{{url('favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
    <base href="{{asset('')}}">

    {{--CSS--}}
    <link rel="stylesheet" type="text/css" href="{{url("admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css")}}" >
    <link rel="stylesheet" type="text/css" href="{{url("admin_asset/bower_components/metisMenu/dist/metisMenu.min.css")}}" >
    <link rel="stylesheet" type="text/css" href="{{url("admin_asset/dist/css/sb-admin-2.css")}}" >
    <link rel="stylesheet" type="text/css" href="{{url('admin_asset/bower_components/font-awesome/css/font-awesome.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" >
    <link rel="stylesheet" type="text/css" href="https://www.amcharts.com/lib/3/plugins/export/export.css" media="all" />

    {{--JS--}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{url('admin_asset/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>
    <script src="{{url('admin_asset/dist/js/sb-admin-2.js')}}"></script>
    <script src="{{url('admin_asset/bower_components/datatables/media/js/jquery.datatables.min.js')}}"></script>
    <script src="{{url('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.9/tinymce.min.js"></script>
    <script src="{{url('admin_asset/tinymce/jquery.tinymce.min.js')}}"></script>
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
</head>

<body>

    <div id="wrapper">
        @include('admin.layout.header')
        @yield('content')
    </div>

    <script>
        function checkDelete () {
            if (!window.confirm("DỮ LIỆU SẼ BỊ XÓA VĨNH VIỄN. BẠN CÓ MUỐN TIẾP TỤC?")) {
                return false;
            };
        }
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                    responsive: true
            });
        });
    </script>
    <script type="text/javascript">
		$(function(){	
             if (typeof country_list !== 'undefined') {
			    $('#singleFieldTags').tagit({	
				    availableTags: country_list,	
				    // This will make Tag-it submit a single form value, as a comma-delimited field.	
				    singleField: true,	
				    singleFieldNode: $('#mySingleField'),	
				    allowSpaces: true	
                    });	
            }
 		});	
	</script>

	<script src="{{url('js/jquery-ui.min.js')}}"></script>
						<script src="{{url('js/tag-it.min.js')}}"></script>
	<script>
		$(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    }
                }
            });
            function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                data.append("_token", "{{csrf_token()}}");
                $.ajax({
                    url: '<?php echo url('admin/ajax/ajax-upload-image') ?>',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(imagename) {
                        var image = $('<img>').attr('src', '<?php echo str_replace("admin/","",url('upload/images')) ?>' + imagename);
                        $('.summernote').summernote("insertNode", image[0]);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });
	</script>
    @yield('script')
</body>
</html>
