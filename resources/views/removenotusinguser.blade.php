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
                            <span class="glyphicon glyphicon-bookmark"></span> This Is Remove Users</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('removenotusinguser') }}">
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
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-trash-o"></i> Remove User
                </button>
            </div>
        </div>







    </form>
@endsection
