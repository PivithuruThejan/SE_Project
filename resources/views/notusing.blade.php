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
                            <span class="glyphicon glyphicon-bookmark"></span> This Is To Find Not Using Users</h3>
                    </div>
                </div>
            </div>
        </div>
    </div></div>


<form class="form-horizontal" role="form" method="POST" action="{{ url('viewnotusing') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label for="selection" class="col-md-4 control-label">Selection Of Users:</label>
        <div class="col-md-6">
            <select class="form-control" id="selection" name="selection">
                <option  value="noqb">Users Who Do Not Have Questionbank</option>
                <option  value="nopaper">Users Who Have Not Set Papers </option>

            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i> Search For Users!
            </button>
        </div>
    </div>







</form>
@endsection
