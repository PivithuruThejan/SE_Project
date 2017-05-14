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
            <button type="button" class="btn btn-info btn-lg">Change Email & Password</button>
            </a>
        </div>

        <div class="btn-group" role="group">
            <a href="{{ url('/removenotusingusers') }}">
            <button type="button" class="btn btn-info btn-lg">Remove Users</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/viewnotusing') }}">
            <button type="button" class="btn btn-info btn-lg">View System Not Using Users </button>
            </a>
        </div>

    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>
@endsection
