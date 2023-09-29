@extends('admin.dashboard.app')
@section('content')

<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Modules Management</h2>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Module Name</th>
                        <th>Read</th>
                        <th>Write</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>Action</th>
                    </tr>
                        @php $i = 1;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td></td>
                            <td><label><input type="checkbox" name="category[]" value="user-read"> </label></td>
                            <td><label><input type="checkbox" name="category[]" value="user-write"> </label></td>
                            <td><label><input type="checkbox" name="category[]" value="user-update"> </label></td>
                            <td><label><input type="checkbox" name="category[]" value="user-delete"> </label></td>
                            <td><a class="btn btn-info" href="">Edit</a>
                            <a class="btn btn-info" href=""> Update</a></td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        
                </table>
            </div>
        </div>
        
      </div>
    </div>
</div>

@endsection