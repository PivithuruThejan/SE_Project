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
                            <span class="glyphicon glyphicon-bookmark"></span>This Is Paper Results</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>User Email</th>
            <th>Deadline</th>
            <th>Level</th>
            <th>Mcq Questions</th>
            <th>Essay Questions</th>
            <th>Start Section</th>
            <th>End Section</th>
            <th>Subject</th>
            <th>Receiver's E mail</th>

        </tr>
        </thead>
        <tbody>

        @foreach ($papers as $questions)
            <tr>

                <th scope="row">{{$questions->id}}</th>
                <td>{{$questions->user_email}}</td>
                <?php
                $deadline=date('m/d/Y H:i:s', $questions->deadline);
                ?>
                <td>{{$deadline}}</td>
                <td>{{$questions->level}}</td>
                <td>{{$questions->mcqno}}</td>
                <td>{{$questions->essayno}}</td>
                <?php
                $answers=explode("#",$questions->section);
                ?>
                <td>{{$answers[0]}}</td>
                <td>{{$answers[1]}}</td>
                <td>{{$questions->subject}}</td>
                <td>{{$questions->receiver_email}}</td>


            </tr>

        @endforeach


        </tbody>
    </table>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <a href="{{ url('/') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-backward"></i> Exit
                </button>
            </a>

            <a href="{{ url('/givemodifypaper') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-scissors"></i> Modify
                </button>
            </a>
        </div>


    </div>



@endsection