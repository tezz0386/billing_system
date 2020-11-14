@extends('layouts.app-1')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<input type="text" name="search" class="my_search float-right" id="search" placeholder="Search here">
		</div>
		<div class="card-body">
			<table class="table table-default">
				<thead>
					<tr>
						<th>#</th>
						<th>Bill No</th>
						<th>Name</th>
						<th>Address</th>
						<th>Total Amount</th>
						<th>Date</th>
						<th  colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(isset($bills) && count($bills)>0)
					@foreach($bills as $bill)
					<tr>
						<td>{{$n++}}</td>
						<td>{{$bill->bill_no}}</td>
						<td>{{$bill->byer_name}}</td>
						<td>{{$bill->byer_address}}</td>
						<td>{{$bill->total}}</td>
						<td>{{$bill->date}}</td>
						<td><a href="{{route('billprint', $bill->id)}}"><i class="fas fa-print"></i></a></td>
						<td>
							<form method="post"  action="{{route('trash')}}">
								{{csrf_field()}}
								<input type="hidden" name="id" value="{{$bill->id}}">
								<button type="submit"><i class="fas fa-trash"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="8"><center>Record Not Fond</center></td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
		<div class="card-footer">
				{{ $bills->links() }}
		</div>
	</div>
</div>

<style type="text/css">
	table{
		font-size: 14px;
	}
	.my_search{
	outline: none;
    border-top: none;
    border-left: none;
    border-right: none;
    }
</style>
@endsection
@section('script')
  <script type="text/javascript">
  	$(document).ready(function(){
         function fetch_data(query='')
         {
         	$.ajax({
         		 url:"{{route('live.search')}}",
         		 method:'get',
         		 data:{query1:query},
         		 dataType:'json',
         		 success:function(data)
         		 {
         		 	$('tbody').html(data.table_data);
         		 },
         		 error: function(e) {
                  console.log(e.responseText);
                 }

         	});
         }

    $(document).on('keyup', '#search', function(){
         var query=$(this).val();
         fetch_data(query);
    });
  	});
  </script>
@endsection