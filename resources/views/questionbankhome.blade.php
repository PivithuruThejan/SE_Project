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
                <button type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-pencil"></span>Change Question Bank Password </button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/createsubject') }}">
                <button type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-wrench"></span>Create A Subject</button>
            </a>
        </div>

        <div class="btn-group" role="group">
            <a href="{{ url('/modifysubject') }}">
                <button type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-scissors"></span>Modify A Subject</button>
            </a>
        </div>


    </div>


    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('/insertessayquestion') }}">
                <button  type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-floppy-open"></span>Insert An Esssay Question</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/searchmodifyessayquestion') }}">
                <button type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-scissors"></span>Search & Modify An Essay Question</button>
            </a>
        </div>


    </div>


    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('/insertmcqquestion') }}">
                <button  type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-floppy-open"></span>Insert A MCQ Question</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/searchmodifymcqquestion') }}">
                <button type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-scissors"></span>Search & Modify A MCQ Question</button>
            </a>
        </div>


    </div>

    <div class="btn-group btn-group-justified" role="group" aria-label="...">

        <div class="btn-group" role="group">
            <a href="{{ url('/deletequestion') }}">
                <button type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-trash"></span>Delete A Question</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/deletesubject') }}">
                <button type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-trash"></span>Delete A Subject</button>
            </a>
        </div>

    </div>

@endsection
