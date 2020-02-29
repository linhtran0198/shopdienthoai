@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
	 <div class="panel panel-default">
	 	<div class="panel-heading">
	      Chi tiết Danh mục sản phẩm
	    </div>
     <table class="table table-striped b-t b-light">
		@foreach($view_cate_prod_id as $key => $v_cate)
		<tr>
			<th style="width: 170px;">Tên danh mục :</th>
			<td>{{ $v_cate ->category_name}}</td>
		</tr>
		<tr>
			<th style="width: 170px;">Mô tả danh mục:</th>
			<td>{{ $v_cate -> category_desc}}</td>

		</tr>
		
		@endforeach
	</table>
</div>
</div>

@endsection