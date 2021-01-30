{{-- @if($chitiet) --}}
	<table class="table">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Hình ảnh</th>
				<th>Giá</th>
				<th>Số Lượng</th>
				<th>Thành Tiền</th>
			</tr>
		</thead>
		{{-- <tbody>
			@foreach($chitiet as $hdct)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{($hdct->sanpham->tensanpham)}}</td>
				<td><img width="100px"{{$hdct->sanpham->hinhanhA}}"></td>
				<td>{{number_format($hdct->gia,0,',','.')}}</td>
				<td>{{($hdct->soluongsanpham)}}</td>
				<td>{{number_format($hdct->soluongsanpham * $hdct->giasanpham,0,',','.')}}</td>
			</tr>
			@endforeach
		</tbody> --}}
		
	</table>
{{-- @endif --}}