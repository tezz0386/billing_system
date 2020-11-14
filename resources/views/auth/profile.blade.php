@extends('layouts.app-1')
@section('content')
<div class="row">
	<div class="col-md-3 col-lg-3 col-xl-3"></div>
	<div class="col-md-6 col-lg-6 col-xl-6">
		<div class="card" style="border: 1.5px dotted; margin-top: 20%;">
			<div class="card-header">
				<center><strong>Profile</strong></center>
			</div>
			<div class="card-body">
				<div>
					<center>
					<form action="{{route('image.upload')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
					<div class="image-upload">
						<label for="file-input">
							<img 

								@if(auth()->user()->profile == null)
                                      src="{{asset('image/profile.jpg')}}"
                                @else
                                src="{{asset('image/'.auth()->user()->profile)}}"
								@endif




							 style="border-radius: 150px;" width="150px" height="150px;" id="profile_image" />
						</label>
						<input id="file-input" type="file" name="profile" />
					</div>
					<button type="submit" id="image_upload" class="btn btn-primary btn-sm" hidden="hidden">Upload</button>
                    </form>
					</center>
				</div>
				<div>
					<center><strong>{{auth()->user()->name}}</strong></center>
				</div>
				<div>
					<label>Email: <strong>{{auth()->user()->email}}</strong>  <a href="#" data-toggle="modal" data-target="#email_modal"><i class="fas fa-edit"></i></a></label>
				</div>
				<div>
					<label>Contact No: <strong>{{auth()->user()->ph_no}}</strong>  <a href="#"  data-toggle="modal" data-target="#contact_modal"><i class="fas fa-edit"></i></a></label>
				</div>
			</div>
			<div class="card-footer">
				<center><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#password_modal">Change password</a></center>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-lg-3 col-xl-3"></div>
</div>
<div class="modal fade" id="email_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Email change</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('email.change')}}" method="post" autocomplete="off">
				{{csrf_field()}}
				<div class="modal-body">
					<input type="email" name="email" class="form-control" id="email" placeholder="Jone@gmail.com"  value="{{auth()->user()->email}}" required="required">
					<input type="password" name="password" class="form-control" id="password" placeholder="password" required="required">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="contact_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Contact change</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('contact.change')}}" method="post" autocomplete="off">
				{{csrf_field()}}
				<div class="modal-body">
					<input type="number" name="ph_no" class="form-control" id="ph_no" placeholder="Enter Contact Number" required="required" value="{{auth()->user()->ph_no}}">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Password change</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('password.change')}}" method="post" autocomplete="off">
				{{csrf_field()}}
				<div class="modal-body">
					<div class="input-group">
						<input class="form-control left-border-none" placeholder="Old Password" type="password" name="old_password" id="old_pasword" required="required">
						<span class="input-group-addon transparent">
						<i class='fas fa-check-circle fa-lg' aria-hidden='true' hidden="hidden" id="old_true"></i></span>
						<span class="input-group-addon transparent">
						<i class='fas fa-times-circle fa-lg' aria-hidden='true' id="old_false"></i></span>
					</div>
					<div class="input-group">
						<input class="form-control left-border-none" placeholder="New Password" type="password" name="password" id="new_password" required="required">
						<span class="input-group-addon transparent">
						<i class='fas fa-check-circle fa-lg' aria-hidden='true' hidden="hidden" id="new_true"></i></span>
						<span class="input-group-addon transparent">
						<i class='fas fa-times-circle fa-lg' aria-hidden='true' id="new_false"></i></span>
					</div>
					<div class="input-group">
						<input class="form-control left-border-none" placeholder="Confirm Password" type="password" name="confirm_password" id="confirm_password" required="required">
						<span class="input-group-addon transparent">
						<i class='fas fa-check-circle fa-lg' aria-hidden='true' hidden="hidden" id="confirm_true"></i></span>
						<span class="input-group-addon transparent">
						<i class='fas fa-times-circle fa-lg' aria-hidden='true' id="confirm_false"></i></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<style type="text/css">
	input{
		margin-top: 5px;
	}
	.image-upload>input {
	   display: none;
	}
</style>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
$('#old_pasword').on('keyup', function(){
	if($(this).val()!='')
	{
$('#old_false').hide();
$('#old_true').removeAttr('hidden');
	}
	else
	{
		$('#old_false').show();
$('#old_true').attr('hidden', 'hidden');
	}
});
$('#new_password').on('keyup', function(){
	if($(this).val()!='')
	{
$('#new_false').hide();
$('#new_true').removeAttr('hidden');
	}
	else
	{
		$('#new_false').show();
$('#new_true').attr('hidden', 'hidden');
	}
});
$('#confirm_password').on('keyup', function(){
	if($(this).val()!='')
	{
if($(this).val()==$('#new_password').val())
{
	$('#confirm_false').hide();
    $('#confirm_true').removeAttr('hidden');
}
else
{
	$('#confirm_false').show();
$('#confirm_true').attr('hidden', 'hidden');
}
	}
	else
	{
		$('#confirm_false').show();
$('#confirm_true').attr('hidden', 'hidden');
	}
});
});

	 $('#file-input').change(function(evt) {
        $('#image_upload').removeAttr('hidden');
        readURL(this);
    });


	 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}



</script>
@endsection