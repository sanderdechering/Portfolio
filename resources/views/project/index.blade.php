@extends('layout')

@section('title')
    Admin panel | Sander Dechering
@endsection

@section('content')
    <div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 my-4">
        <h2>All Projects <a href="/admin" class="btn btn-link float-right mb-5">Back to Admin Panel</a></h2>
        @foreach($projects as $project)
            <a href="/admin/projects/{{ $project->id }}">
                <div class="module my-5">
                    @if( isset($project->image[0]))
                        @foreach($project->image as $image)
                            @if($image->main_image == 1)
                                <img src="/storage/images/{{ $image->title }}" class="img-fluid" alt="plaatje">
                            @endif
                        @endforeach
                    @else
                        <img src="/storage/images/demo.jpeg" class="img-fluid">
                    @endif
                    <header class="mb-5 ml-4">
                        <h2>{{ $project->title }}</h2>
                    </header>
                </div>
            </a>
        @endforeach
        <h2>New Project</h2>
        <form action="/admin/projects" method="POST" enctype="multipart/form-data" class="my-5 bg-white p-4 rounded shadow">
            <div class="form-group">
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Title">
                <div>{{ $errors->first('title') }}</div>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="mytextarea" name="information">{{ old('information') }}</textarea>
                <div>{{ $errors->first('information') }}</div>
            </div>
            <button type="submit" class="btn btn-primary">Add Project</button>
            @csrf
        </form>
    </div>

@endsection
