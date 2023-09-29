@extends('admin.dashboard.app')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Student Record</h2>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h2>Students</h2>
                                @foreach($students as $student)
                                {{ $student->first_name }}
                                {{ $student->last_name }}
                                {{ $student->rank }}
                                @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection