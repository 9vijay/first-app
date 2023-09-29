@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center p-2 m-2">
        <div class="card p-2 w-50">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>User Profile</h3>
                </div>
                <div class="">
                    <a href="{{ route('user.edit',$user->id) }}"><button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                </div>
            </div>
            <hr class="my-1 mb-2">
            <div class="row">
                <div class="col-12">
                    <h6>User Information</h6>
                    <hr class="my-1">
                    <div class="d-flex justify-content-between">
                        <label class="">Name :</label>
                        <span class="text-primary">{{ $user->name }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label class="">Email Id :</label>
                        <span class="text-primary">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection