@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        This is Question Bank Home.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('/insertquestion') }}">
                <button  type="button" class="btn btn-default">Insert A Question</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/searchquestion') }}">
                <button type="button" class="btn btn-default">Search A Question</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/register') }}">
                <button type="button" class="btn btn-default">Change Question Bank Password </button>
            </a>
        </div>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('/modifyquestion') }}">
                <button type="button" class="btn btn-default">Modify A Question</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/deletequestion') }}">
                <button type="button" class="btn btn-default">Delete A Question</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/deletesubject') }}">
                <button type="button" class="btn btn-default">Delete A Subject</button>
            </a>
        </div>
    </div>
@endsection
