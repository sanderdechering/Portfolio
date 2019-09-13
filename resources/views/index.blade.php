@extends('layout')

@section('title')
    Welcome | Sander Dechering
@endsection

@section('content')
    <div class="col-sm-4 offset-1">
        <h1 class="title">Sander<br>Dechering</h1>
        <div class="divider"></div>
        <p>
            I’m a Dutch student at the University of Applied Sciences in Rotterdam The Netherlands (HogeSchool Rotterdam).
            I’m following the study Creative Media and Game Technologies (four-year full-time bachelor).
        </p>
        <p>
            I’m a calm person with excessive interest in my profession.I’m analytical but also appreciated for
            my communication skills. I have an inquisitive attitude and want to get to know users and involve them
            as intensively as possible in making the product.
        </p>
        <p>
            I’m a calm person with excessive interest in my profession.I’m analytical but also appreciated for
            my communication skills. I have an inquisitive attitude and want to get to know users and involve them
            as intensively as possible in making the product.
        </p>
        @foreach ($projects as $project)
            <li>{{$project->title}}</li>
        @endforeach
    </div>
    <div class="col-sm-4 offset-2 right">
        <div class="row">
            <div class="col-sm-12">
                <img src="{{'img/pbg.jpeg'}}" class="project-img">
            </div>
            <div class="col-sm-12">
                <img src="{{'img/bc.jpeg'}}" class="project-img">
            </div>
            <div class="col-sm-12">
                <img src="{{'img/bc.jpeg'}}" class="project-img">
            </div>
        </div>
    </div>
    <div class="col-sm-1">
        Option bar
    </div>


@endsection
