@extends('layouts.app-1')
@section('content')
<div class="row">
	<div class="col-md-12 col-lg-12 col-xl-12">
		<form action="{{route('setting.update')}}" method="post">
			{{csrf_field()}}
			<div class="card">
				<div class="card-header">
					<center>Setting</center>
				</div>
				<div class="card-body">
					@if(isset($settings) && count($settings)>0)
					@foreach($settings as $setting)
					<input type="text" name="id" value="{{$setting->id}}" hidden="hidden">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Shop Name</span>
						</div>
						<input type="text" class="form-control" placeholder="ex: Praptika Stationary and Screen Print" aria-label="Username" aria-describedby="basic-addon1" name="shop_name" required="required" value="{{$setting->shop_name}}">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Address</span>
						</div>
						<input type="text" class="form-control" placeholder="ex: Ghosaghodi 3 Nimdi kailali" aria-label="Username" aria-describedby="basic-addon1" name="address" required="required" value="{{$setting->address}}">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Pan No</span>
						</div>
						<input type="text" class="form-control" placeholder="ex: 30128015" aria-label="Username" aria-describedby="basic-addon1" name="pan_no" value="{{$setting->pan_no}}">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Contact No</span>
						</div>
						<input type="text" class="form-control" placeholder="ex: 980575520" aria-label="Username" aria-describedby="basic-addon1" name="contact_no" required="required" value="{{$setting->contact_no}}">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Choose Date Type:</span>
						</div>
						<div class="form-check-inline ml-3">
							<label class="form-check-label" for="radio1">
								<input type="radio" class="form-check-input" id="radio1" name="date_type" value="0"
								@if($setting->date_type==0) checked @endif
								>AD
							</label>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label" for="radio2">
								<input type="radio" class="form-check-input" id="radio2" name="date_type" value="1" @if($setting->date_type==1) checked @endif>BS
							</label>
						</div>
					</div>
                    @endforeach
                    @endif

				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary float-right">Save</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
@endsection