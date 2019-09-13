@extends('layout')

@section('title')
    {{ $image->title }} | Sander Dechering
@endsection

@section('content')
    <div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 my-4">
        <h3 class="my-5">{{ $image->title }} <a href="/admin/projects/{{$image->project_id}}" class="btn btn-link float-right">Back to project</a></h3>
        <img src="/storage/images/{{ $image->title }}" alt="{{ $image->title }}" class="img-fluid">
        @if($image->main_image == 0)
            <form action="/admin/images/{{ $image->id }}/edit" action="POST">
                <button class="btn btn-primary">Edit image</button>
            </form>
        @else
            <p>This is your main image</p>
        @endif
    </div>
@endsection
