@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        This is Modify A Question.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <label for="usr">Type:</label>
            <input type="text" class="form-control" id="usr">
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <label for="usr">Question:</label>
            <input type="text" class="form-control" id="usr">
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <label for="usr">Answer:</label>
            <input type="text" class="form-control" id="usr">
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <label for="usr">Subject:</label>
            <input type="text" class="form-control" id="usr">
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <label for="usr">Section:</label>
            <input type="text" class="form-control" id="usr">
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <label for="usr">Level Hardness:</label>
            <input type="text" class="form-control" id="usr">
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <label for="usr">Question Id:</label>
            <input type="text" class="form-control" id="usr">
        </div>
    </div>


    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Modify The Question</button>
        </div>

    </div>

@endsection
