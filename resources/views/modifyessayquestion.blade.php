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
                            <span class="glyphicon glyphicon-bookmark"></span> This Is Results Of Essay Question Search</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Marks</th>
            <th>Section</th>
            <th>Hardness</th>
            <th>Subject</th>

        </tr>
        </thead>
        <tbody>

            @foreach ($questions as $questions)
                <tr>

                    <th scope="row">{{$questions->id}}</th>
                    <td>{{$questions->type}}</td>
                    <td>{{$questions->question}}</td>
                    <td>{{$questions->answer}}</td>
                    <td>{{$questions->marks}}</td>
                    <td>{{$questions->section}}</td>
                    <td>{{$questions->levelofhardness}}</td>
                    <td>{{$questions->subjectname}}</td>


                </tr>

            @endforeach


        </tbody>
    </table>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <a href="{{ url('/questionbank') }}">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-backward" ></i> Exit
            </button>
            </a>

            <a href="{{ url('/modifyessayquestion') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-scissors"></i> Modify
                </button>
            </a>
        </div>


    </div>



@endsection