@if($errors->any())
    <h4>{{$errors->first()}}</h4>
@endif
@extends('layouts.questionbankapp')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-bookmark"></span> This Is Question Bank Home</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('/changeqbemailpassword') }}">
                <button type="button" class="btn btn-info btn-lg">Change Question Bank Password </button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/createsubject') }}">
                <button type="button" class="btn btn-info btn-lg">Create A Subject</button>
            </a>
        </div>

        <div class="btn-group" role="group">
            <a href="{{ url('/modifysubject') }}">
                <button type="button" class="btn btn-info btn-lg">Modify A Subject</button>
            </a>
        </div>


    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('/insertessayquestion') }}">
                <button  type="button" class="btn btn-info btn-lg">Insert An Esssay Question</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/searchmodifyessayquestion') }}">
                <button type="button" class="btn btn-info btn-lg">Search & Modify An Essay Question</button>
            </a>
        </div>


    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('/insertmcqquestion') }}">
                <button  type="button" class="btn btn-info btn-lg">Insert A MCQ Question</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/searchmodifymcqquestion') }}">
                <button type="button" class="btn btn-info btn-lg">Search & Modify A MCQ Question</button>
            </a>
        </div>


    </div>
    <div class="alert alert-info">
        <strong></strong>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">

        <div class="btn-group" role="group">
            <a href="{{ url('/deletequestion') }}">
                <button type="button" class="btn btn-info btn-lg">Delete A Question</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/deletesubject') }}">
                <button type="button" class="btn btn-info btn-lg">Delete A Subject</button>
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
@endsection
