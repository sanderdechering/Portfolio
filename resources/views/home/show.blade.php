@extends('layout')

@section('title')
    {{ $project->title }} | Sander Dechering
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-5 information sticky-top ">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-2 my-7">
                    <h1 class="title mb-5">{{ $project->title }}</h1>
                    <p>
                        {!! $project->information !!}
                    </p>
                    <a href="{{url('/')}}" class="btn btn-primary text-white mt-4">Back to the homepage</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-2 my-7">
            <div class="row">
                @foreach( $project->image as $image)
                    <div class="col-10 col-md-12 offset-1 my-4">
                        <img src="/storage/images/{{ $image->title }}" class="img-fluid shadow" alt="{{ $image->title }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
