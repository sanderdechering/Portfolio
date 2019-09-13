@extends('layout')

@section('title')
    Welcome | Sander Dechering
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-5 information sticky-top ">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-2 mt-7">
                    <h1 class="title mb-5 mt-n3">Sander<br>Dechering</h1>
                    <p>
                        Hi, my name is Sander Dechering and I’m a Dutch student at
                        the University of Applied Sciences in the Netherlands Rotterdam, following
                        the study <a target="_blank" href="https://www.hogeschoolrotterdam.nl/opleidingen/bachelor/creative-media-and-game-technologies/voltijd/">Creative Media and Game Technologies</a>.
                        Welcome to my personal website, where I showcase myself and my work!
                    </p>
                    <p>
                        Keep in mind that this is an early version of my portfolio! As times goes by I will add more projects and assignments.
                    </p>
                    <div class="row mt-5">
                        <div class="col-4 col-lg-3">
                            <a href="{{ url('/contact') }}" class="btn btn-primary text-white px-3">Contact me!</a>
                        </div>
                        <div class="col-5 col-lg-4">
                            <a href="/11" class="btn btn-primary text-white px-3">More about me!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-2">
            <div class="row">
                @foreach($projects as $project)
                    @if( isset($project->image[0]))
                        @foreach($project->image as $image)
                            @if($image->main_image == 1)
                                <div class="col-10 col-md-12 offset-1 my-4 module">
                                    <a href="/{{ $project->id }}">
                                        <img src="/storage/images/{{ $image->title }}" class="img-fluid shadow-lg" alt="{{ $image->title }}">
                                        <div class="overlay"></div>
                                        <h2>{{ $project->title }}</h2>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="col-sm-10 offset-1">
                            <img src="/storage/images/demo.jpeg" class="img-fluid" alt="{{ $image->title }}">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
