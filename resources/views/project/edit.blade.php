@extends('layout')

@section('title')
    Edit {{ $project->Title }}| Sander Dechering
@endsection

@section('content')
    {{-- INFORMATION UPDATE SECTION --}}
    <div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 my-4">
        <h2 class="mb-5">Update form <a href="/admin/projects/{{$project->id}}" class="btn btn-link float-right">Back to {{ $project->title }}</a></h2>
        <form action="/admin/projects/{{$project->id}}" method="POST">
            <div class="form-group">
                <input type="text" name="title" class="form-control" value="{{ old('title') ?? $project->title  }}" >
                <div>{{ $errors->first('title') }}</div>
            </div>
            <div class="form-group">
                <textarea id="mytextarea" name="information" rows="20">{{ old('information') ?? $project->information }}</textarea>
                <div>{{ $errors->first('information') }}</div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary my-3">Update Project</button>
            </div>
            @method('PATCH')
            @csrf
        </form>
    </div>

    {{-- ALL IMAGES SECTION--}}
    <div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 my-4">
        <h2 class="mb-5">Image Library</h2>
        <div class="row">
            @if( isset($project->image[0]))
                @foreach($project->image as $image)
                    @if($image->main_image != 1)
                        <div class="col-4">
                            <a href="/admin/images/{{$image->id}}">
                                <img src="/storage/images/{{ $image->title }}" class="img-fluid" alt="{{$image->title}}">
                            </a>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-12">
                    <p class="alert-info alert p-4">You have no images</p>
                </div>
            @endif
        </div>

        <!--MAIN IMAGE SECTION-->
        <div class="row my-5">
            <div class="col-4">
                <h3>Main image</h3>
                @foreach($project->image as $image)
                    @if($image->main_image == 1)
                        <img src="/storage/images/{{ $image->title }}" class="img-fluid" alt="{{$image->title}}">
                    @endif
                @endforeach
            </div>
        </div>

        <!--IMAGE CREATE FORM-->
        <div class="my-5">
            <h3 class="my-3">Add image</h3>
            <form action="/admin/images/store" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="{{$project->id}} " name="project_id">
                <input type="hidden" value="0" name="main_image">
                <div class="input-group my-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="image">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                </div>
                @if(!$errors->isEmpty())
                    <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-primary my-3">Add image</button>
                </div>
                @csrf
            </form>
        </div>
    </div>

@endsection
