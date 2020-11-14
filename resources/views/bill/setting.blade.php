@extends('layouts.app-1')
@section('content')
<div class="row">
	<div class="col-md-12 col-lg-12 col-xl-12">
		<form action="{{route('setting.post')}}" method="post">
			{{csrf_field()}}
			<div class="card">
				<div class="card-header">
					<center>Setting</center>
				</div>
				<div class="card-body">
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					@if(Session::has('sucess'))
					<div class="alert alert-success">
						<strong>Sucessfully saved</strong>
					</div>
					@endif
					@if(Session::has('error'))
					<div class="alert alert-warning">
						<strong>Could not saved please try again</strong>
					</div>
					@endif
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Shop Name</span>
						</div>
						<input type="text" class="form-control" placeholder="ex: Praptika Stationary and Screen Print" aria-label="Username" aria-describedby="basic-addon1" name="shop_name" required="required">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Address</span>
						</div>
						<input type="text" class="form-control" placeholder="ex: Ghosaghodi 3 Nimdi kailali" aria-label="Username" aria-describedby="basic-addon1" name="address" required="required">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Pan No</span>
						</div>
						<input type="text" class="form-control" placeholder="ex: 30128015" aria-label="Username" aria-describedby="basic-addon1" name="pan_no">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Contact No</span>
						</div>
						<input type="text" class="form-control" placeholder="ex: 980575520" aria-label="Username" aria-describedby="basic-addon1" name="contact_no" required="required">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Choose Date Type:</span>
						</div>
						<div class="form-check-inline ml-3">
							<label class="form-check-label" for="radio1">
								<input type="radio" class="form-check-input" id="radio1" name="date_type" value="0" checked>AD
							</label>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label" for="radio2">
								<input type="radio" class="form-check-input" id="radio2" name="date_type" value="1">BS
							</label>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary float-right">Save</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
@endsection