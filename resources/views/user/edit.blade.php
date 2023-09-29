@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center p-2 m-2">
    <div class="card p-2 w-50">
        <div class="d-flex justify-content-between">
            <div class="">
                <h3>Edit User</h3>
            </div>
            <div class="">
                <a href="{{ route('user.index') }}"><button class="btn btn-primary"><i class="fa fa-list"></i> User List</button></a>
            </div>
        </div>
        <hr class="my-1">
        <form action="{{ route('user.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="userid" value="{{$user->id}}">
            <div class="row">
                <div class="col">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter name here.." required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Email Id</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
                </div>
            </div>
            <div class="my-2">
                <button type="submit" class="btn btn-success w-100">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection