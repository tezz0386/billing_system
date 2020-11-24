@extends('layouts.app-1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="my-3"></div>
            <form action="{{ $setting->exists ? route('settings.update', $setting) : route('settings.store') }}" method="post" class="form">
                {{ csrf_field() }}
                @if($setting->exists)
                <input type="hidden" name="id" value="{{ $setting->id }}">
                @endif
                <div class="card">
                    <h4 class="h4-responsive card-header text-center font-weight-bolder">
                        App Settings
                    </h4>
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


                        <div class="form-group">
                            <label for="">Shop Name</label>
                            <input type="text" name="shop_name" class="form-control" value="{{ old('shop_name', $setting->shop_name) }}" placeholder="ex: Praptika Stationary and Screen Print">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address', $setting->address) }}" placeholder="ex: Ghosaghodi 3 Nimdi kailali">
                        </div>

                        <div class="form-group">
                            <label for="">Pan No.</label>
                            <input type="text" name="pan_no" class="form-control" value="{{ old('pan_no', $setting->pan_no) }}" placeholder="ex: 30128015">
                        </div>

                        <div class="form-group">
                            <label for="">Contact No.</label>
                            <input type="text" name="contact_no" class="form-control" value="{{ old('contact_no', $setting->contact_no) }}" placeholder="ex: 980575520">
                        </div>

                        <div class="form-group">
                            <label for="">Prefered Date Type</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="radio-ad" name="date_type" value="0" @if(old('date_type', $setting->date_type) == 0) checked @endif>
                                    <label class="custom-control-label" for="radio-ad">AD</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="radio-bs" name="date_type" value="1" @if(old('date_type', $setting->date_type) == 1) checked @endif>
                                    <label class="custom-control-label" for="radio-bs">BS</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">{{ $setting->exists ? 'Update' : 'Save' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
