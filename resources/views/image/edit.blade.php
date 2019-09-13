@extends('layout')

@section('title')
    {{ $image->title }} | Sander Dechering
@endsection

@section('content')
    <div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 my-4">
        <h3 class="my-5">{{ $image->title }} <a href="/admin/projects" class="btn btn-link float-right">Back to {{ $image->title }}</a></h3>
        <img src="/storage/images/{{ $image->title }}" alt="{{ $image->title }}" class="img-fluid">
        <form action="/admin/images/{{$image->id}}" method="POST">
            <div class="form-group">
                <input type="hidden" value="{{ $image->project_id }}" name="project_id">
                <div>{{ $errors->first('project_id') }}</div>
            </div>
            <div class="form-group">
                <input type="hidden" value="{{ $image->title }}" name="title">
                <div>{{ $errors->first('title') }}</div>
            </div>
            <div class="form-group">
                <input type="hidden" value="1" name="main_image">
                <div>{{ $errors->first('main_image') }}</div>
            </div>
            <button type="submit" class="btn btn-primary my-3">Make this image the main image</button>
            @method('PATCH')
            @csrf
        </form>
        <form action="/admin/images/{{$image->id}}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </div>
            @method('DELETE')
            @csrf
        </form>
    </div>
@endsection
