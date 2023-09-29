@extends('layouts.app')
@section('content')
@if (\Session::has('msg'))
<div class="text  text-center ">
    <h6 style=" text-align:center !important;">{!! \Session::get('msg') !!}</h6>
</div>
@endif
<div class="d-flex justify-content-center p-2 m-2">
    <div class="card p-2 w-50">
        <div class="d-flex justify-content-between">
            <div class="">
                <h3>Login</h3>
            </div>
        </div>
        <hr class="my-1">
        <form action="{{ route('showlogin') }}" method="post">
        {{ csrf_field() }}
            <div class="row">
                <div class="col">
                <label for="">Email Id</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email here.." value="{{old('email')}}" required />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter passowrd here.." required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-success w-100">Login</button>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="checkbox">
                        <label>
                            <a href="{{ route('forget.password.get') }}">Reset Password</a>
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <div class="text-center">
    <h6><a class="nav-link" href="{{ route('show')}}">Register</a></h6>
</div> -->
@endsection('content')