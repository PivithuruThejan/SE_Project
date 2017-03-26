@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        This is Delete A Subject.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <label for="usr">User Email:</label>
            <input type="text" class="form-control" id="usr">
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            <label for="usr">Subject:</label>
            <input type="text" class="form-control" id="usr">
        </div>
    </div>


    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">Delete The Subject</button>
        </div>

    </div>

@endsection
