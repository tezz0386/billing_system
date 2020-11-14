@extends('layouts.app-1')
@section('content')
<div class="" style="background-color: #343a40 !important">
    <div style="background-color: #ceb7b7; margin-top: 5px;">
        <div><center><p style="color: black; font-size: 25px; font-family: arial">Wel come to the bill generation system</p></center></div>
    </div>
    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i> <a href="{{route('bill-index')}}" style="color: white !important">Bill Generation</a></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i><a href="{{route('bill.index')}}" style="color: white !important;"> View Bill</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection