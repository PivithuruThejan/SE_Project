@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        This is Admin's Home.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">

        <div class="btn-group" role="group">
            <a href="{{ url('admin/register') }}">
            <button type="button" class="btn btn-default">Change Email & Password</button>
            </a>
        </div>

        <div class="btn-group" role="group">
            <a href="{{ url('/removenotusingusers') }}">
            <button type="button" class="btn btn-default">Remove Users</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/notusing') }}">
            <button type="button" class="btn btn-default">View System Not Using Users </button>
            </a>
        </div>
    </div>
@endsection
