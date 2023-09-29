@extends('admin.dashboard.app')
@section('content')
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Permission Management</h2>
                </div>
                <div class="pull-right">
                    <!-- <a class="btn btn-success" href="{{ route('permissioncreate') }}"> Create New permission</a> -->
                </div>
            </div>
        </div>

        <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <!-- <th width="280px">Action</th> -->
        </tr>
            @php $i = 1;
            @endphp
            @foreach ($permissions as $key => $permission)
           
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $permission->name }}</td>
                <td>
                    <!-- <a class="btn btn-info" href="">Show</a> -->
                    
                        <!-- <a class="btn btn-primary" href="">Edit</a> -->
                   
                </td>
            </tr>
            @php
            $i++;
            @endphp
            @endforeach
        </table>
      </div>
    </div>
</div>
@endsection