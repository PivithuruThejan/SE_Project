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
                            <span class="glyphicon glyphicon-bookmark"></span>This Is User Paper Modify</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('modifypaper') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">User E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="id" class="col-md-4 control-label">ID:</label>
            <div class="col-md-6">
                <input id="id" type="number" class="form-control" name="id" required>
            </div>
        </div>

        <div class="form-group">
            <label for="deadline" class="col-md-4 control-label">Deadline :</label>
            <div class="col-md-6">
                <input id="deadline" type="datetime-local" class="form-control" name="deadline" required>
            </div>
        </div>

        <div class="form-group">
            <label for="levelofhardness" class="col-md-4 control-label">Level Of Hardness</label>
            <div class="col-md-6">
                <select class="form-control" id="levelofhardness" name="levelofharness">
                    <option  value="min">min</option>
                    <option  value="moderate">moderate</option>
                    <option  value="max">max</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="mcqno" class="col-md-4 control-label">No Of MCQ Questions:</label>
            <div class="col-md-6">
                <input id="mcqno" type="number" class="form-control" name="mcqno" required>
            </div>
        </div>

        <div class="form-group">
            <label for="essayno" class="col-md-4 control-label">No Of Essay Questions:</label>
            <div class="col-md-6">
                <input id="essayno" type="number" class="form-control" name="essayno" required>
            </div>
        </div>

        <div class="form-group">
            <label for="ssection" class="col-md-4 control-label">Start Section:</label>
            <div class="col-md-6">
                <input id="ssection" type="number" class="form-control" name="ssection" required>
            </div>
        </div>

        <div class="form-group">
            <label for="esection" class="col-md-4 control-label">End  Section:</label>
            <div class="col-md-6">
                <input id="esection" type="number" class="form-control" name="esection" required>
            </div>
        </div>

        <div class="form-group">
            <label for="subject_name" class="col-md-4 control-label">Subject Name:</label>
            <div class="col-md-6">
                <input id="subject_name" type="text" class="form-control" name="subject_name" required>
            </div>
        </div>

        <div class="form-group{{ $errors->has('remail') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Receiver E-Mail Address</label>

            <div class="col-md-6">
                <input id="remail" type="email" class="form-control" name="remail" value="{{ old('email') }}" required>

                @if ($errors->has('remail'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('remail') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-scissors"></i> Modify Paper
                </button>
            </div>
        </div>

    </form>

@endsection
