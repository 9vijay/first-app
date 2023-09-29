@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center p-2 m-2">
    <div class="card p-2">
            <a href="{{ route('profile') }}">
            <button class="btn btn-primary"> Profile </button></a>
    </div>
    <div class="card p-2">
        <a href="{{ route('user.create') }}">
            <button class="btn btn-primary">
                <i class="fa fa-plus"></i> New User</button></a>
    </div>
</div>
<hr class="my-1">
    <div class="d-flex justify-content-center p-2 m-2">
        <!-- @if (\Session::has('msg'))
        <div class="text  text-center ">
            <h6 style=" text-align:center !important;">{!! \Session::get('msg') !!}</h6>
        </div>
        @endif       -->
        <table class="table-bordered " >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1;
                @endphp
                @foreach ($users as $user)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="d-flex">
                        <a class="mx-1" href="{{ route('user.show' ,$user->id) }}"><button class="btn fa fa-eye text-success"></button></a>
                        <a class="mx-1" href="{{ route('user.edit', $user->id) }}"><button class="btn fa fa-edit text-primary"></button></a>
                        <form action="{{ route('user.destroy', $user->id ) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" btn fa fa-trash text-danger" onclick="return confirm('Are you sure to delete this user?')"></button>
                        </form>
                    </td>
                </tr>
                @php $i++;
                @endphp
                @endforeach
            </div>
        </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $users->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection