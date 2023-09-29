@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center p-2 m-2">
    <div class="card p-2 w-50">
        <div class="d-flex justify-content-between">
            <div class="">
                <h3>Create User</h3>
            </div>
            <div class="">
                <a href="{{ route('user.index') }}"><button class="btn btn-primary"><i class="fa fa-list"></i> User List</button></a>
            </div>
        </div>
        <hr class="my-1">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name here.." value="{{old('name')}}" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Email Id</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email here.." value="{{old('email')}}" required>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="">Passowrd</label>
                    <input type="password" name="password" class="form-control" 
                    placeholder="Enter passowrd here.." required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-success w-100">Submit</button>
            </div>
        </form>
    </div>
</div> 
@endsection