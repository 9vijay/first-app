@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <p> User ID: {{ Auth::user()->id }} </p>
                    <p> User Name: {{ Auth::user()->name }} </p>
                    <p> User Email: {{ Auth::user()->email }} </p>
                </div>
                <div class="card-body">
                    <a href="{{ route('user.index')}}" >User List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection