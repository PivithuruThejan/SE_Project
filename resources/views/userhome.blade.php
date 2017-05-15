@if($errors->any())
    <h4>{{$errors->first()}}</h4>
@endif

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-bookmark"></span> This Is User Home</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('/questionbankregister') }}">
                <button  type="button"  class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-wrench"></span>Create A Question Bank</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/questionbanklogin') }}">
                <button type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-upload"></span>Log In To Question Bank</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/changeemailpassword') }}">
                <button type="button"  class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-pencil"></span>Change Email & Password </button>
            </a>
        </div>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href="{{ url('/paperset') }}">
                <button type="button"  class="btn btn-info btn-lg paddingButton" ><span class="glyphicon glyphicon-folder-open"></span>Set A Paper</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/papermodify') }}">
                <button type="button" class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-scissors"></span>Search & Modify A Paper</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/paperbuild') }}">
                <button type="button"  class="btn btn-info btn-lg paddingButton" ><span class="glyphicon glyphicon-object-align-horizontal"></span>Build A Paper</button>
            </a>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ url('/paperdelete') }}">
                <button type="button"  class="btn btn-info btn-lg paddingButton"><span class="glyphicon glyphicon-trash"></span>Delete A Paper</button>
            </a>
        </div>
    </div>




@endsection
