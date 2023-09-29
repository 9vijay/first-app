@extends('layouts.app')
@section('content')
@if (\Session::has('msg'))
<div class="text  text-center ">
    <h6 style=" text-align:center !important;"><b>Success! </b>{!! \Session::get('msg') !!}</h6>
</div>
@endif
<div class="d-flex justify-content-center p-2 m-2">
    <div class="card p-2 w-50">
        <div class="d-flex justify-content-between">
            <div class="">
                <h3>Registration</h3>
            </div>
        </div>
        <hr class="my-1">
        <form action="{{ route('show') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name here.." value="{{old('name')}}" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Email Id</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email here.." value="{{old('email')}}" required>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="">Passowrd</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Enter password" required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="">Confirm Passowrd</label>
                <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password_confirmation" placeholder="Confirm password" required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-success w-100">Register</button>
            </div>
        </form>
    </div>
</div> 
@endsection('content')