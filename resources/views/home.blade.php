@extends('layouts.app-1')
@section('content')
<div class="p-3" style="background-color: #343a40 !important">
    <div class="bg-primary text-white p-3">
        <h2 class="text-center">
            Welcome {{ Auth::user()->name }}
        </h2>
    </div>
    <div class="container mt-5">
        <a class="btn btn-success btn-lg text-white p-4" href="{{route('bill-index')}}"> <span class="mr-2"><i class="fas fa-plus"></i></span>Generate New Bill</a>
        <a class="btn btn-warning btn-lg text-white p-4 ml-3" href="{{route('bill.index')}}"> <span class="mr-2"><i class="fas fa-table"></i></span>View Bill Diary</a>
    </div>
</div>
@endsection
