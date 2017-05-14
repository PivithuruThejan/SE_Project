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
                            <span class="glyphicon glyphicon-bookmark"></span> User Email(Have Not Set A Questionbank!)</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th>User Email(Have Not Set A Questionbank!)</th>

        </tr>
        </thead>
        <tbody>

        @foreach ($notqbuser as $notqbuser)
            <tr>
                <td>{{$notqbuser->email}}</td>

            </tr>

        @endforeach


        </tbody>
    </table>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <a href="{{ url('/adminhome') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Exit
                </button>
            </a>


        </div>


    </div>



@endsection