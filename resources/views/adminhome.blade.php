@if($errors->any())
    <h4>{{$errors->first()}}</h4>
@endif
@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-bookmark"></span> This Is Admin Home</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">

        <div class="btn-group" role="group" >
            <a href="{{ url('changeadminemailpassword') }}">
            <button type="button" class="btn btn-info btn-lg paddingButton"> <span class="glyphicon glyphicon-pencil"></span>Change Email & Password</button>
            </a>
        </div>

        <div class="btn-group" role="group">
            <a href="{{ url('/removenotusingusers') }}">
            <button type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-remove"></span>Remove Users</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/viewnotusing') }}">
            <button type="button" class="btn btn-info btn-lg paddingButton"> <span class="glyphicon glyphicon-eye-open"></span>View System Not Using Users </button>
            </a>
        </div>

    </div>

@endsection
