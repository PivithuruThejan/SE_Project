@extends('layouts.app')

@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="image/question.jpg" alt="Image">
                <div class="carousel-caption">
                    <h3>Insert Questions ???</h3>
                    <p>Keep A Question Bank</p>
                </div>
            </div>

            <div class="item">
                <img src="image/paper.jpg" alt="Image">
                <div class="carousel-caption">
                    <h3>Generate Papers</h3>
                    <p>On a Specific Deadline</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container text-center">
        <h3>System Provides You!!</h3><br>
        <div class="row">
            <div class="col-sm-4">
                <img src="image/create.jpg" class="img-responsive" style="width:100%" alt="Image">
                <h3>Set Papers According To User Desire.</h3>
            </div>
            <div class="col-sm-4">
                <img src="image/trigger.jpg" class="img-responsive" style="width:100%" alt="Image">
                <h3>Set Deadlines To Generate Papers.</h3>
            </div>
            <div class="col-sm-4">
                <div class="well">
                    <h3>Maintain a Question Bank for Essay type and MCQ type question. </h3>
                </div>
                <div class="well">
                    <h3>Set Future Deadlines To Automatically Generate Papers And Email To Relevant Parties.</h3>
                </div>
            </div>
        </div>
    </div><br>

    <footer class="container-fluid text-center">
        <h4>System Designed And Developed By Pivithuru Thejan Amarasinghe.</h4>
    </footer>

@endsection
