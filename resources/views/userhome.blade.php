@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    This is User Home.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <a href="{{ url('/register') }}">
        <button  type="button" class="btn btn-default">Create A Question Bank</button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="{{ url('/login') }}">
        <button type="button" class="btn btn-default">Log In To Question Bank</button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="{{ url('/register') }}">
        <button type="button" class="btn btn-default">Change Email & Password </button>
        </a>
    </div>
</div>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <a href="{{ url('/paperset') }}">
        <button type="button" class="btn btn-default">Set A Paper</button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="{{ url('/papermodify') }}">
        <button type="button" class="btn btn-default">Modify A Paper</button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="{{ url('/paperdelete') }}">
        <button type="button" class="btn btn-default">Delete A Paper</button>
        </a>
    </div>
</div>
@endsection
