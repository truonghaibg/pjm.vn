@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
					{{$title}}<small> danh sách</small>
				</h1>
            </div>
			<div class="col-lg-12">
                <a class="btn btn-success" href="{{url('admin/subcrible/create')}}" >Thêm mới</a>
				<p></p>
            </div>
			<div class="col-lg-12">
				@if(session('info'))
					<div class="alert alert-info">
						{{session('info')}}
					</div>
				@endif
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr align="center">
							<th>ID</th>
							<th>Email</th>
							<th>status</th>
							<th>Ngày tạo</th>
							<th>Ngày cập nhật</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@foreach($items as $item)
						<tr class="odd gradeX" align="center">
							<td>{{$item->id}}</td>
							<td>{{$item->email}}</td>
							<td>{{$item->status}}</td>
							<td>{{$item->created_at}}</td>
							<td>{{$item->updated_at}}</td>
							<td class="center">
								<a href="{{url("admin/subcrible/edit", $item->id)}}">
									<button type="button" class="btn btn-outline-warning btn-sm">Edit</button>
								</a>
								<a href="{{url("admin/subcrible/delete", $item->id)}}" onclick="return checkDelete()">
									<button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
								</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
        </div>
    </div>
</div>
@endsection
