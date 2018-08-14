<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MOBIFONE THAI NGUYEN 2016">
    <meta name="author" content="">
    <title>MÁY TÍNH NGỌC CƯỜNG</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
</head>

<body>

    <div id="wrapper">
        @include('admin.layout.header')
        @yield('content')
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <!-- <script src="admin_asset/ckeditor/ckeditor.js" ></script> -->
    <script src="admin_asset/tinymce/tinymce.min.js"></script>
    <script src="admin_asset/tinymce/jquery.tinymce.min.js"></script>
    <script src="admin_asset/summernote-master/dist/summernote.js"></script>
    <link href="admin_asset/summernote-master/dist/summernote.css" rel="stylesheet">
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
	
    </script>
	<script src="{{url("/")}}/js/jquery-ui.min.js"></script>
						<script src="{{url("/")}}/js/tag-it.min.js"></script>
	<script type="text/javascript">
		$(function(){
			
            console.log(country_list);
			$('#singleFieldTags').tagit({
				availableTags: country_list,
				// This will make Tag-it submit a single form value, as a comma-delimited field.
				singleField: true,
				singleFieldNode: $('#mySingleField'),
				allowSpaces: true
			});

		});
	</script>
    @yield('script')
	
</body>

</html>
