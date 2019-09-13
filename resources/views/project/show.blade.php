@extends('layout')

@section('title')
    Admin panel | Sander Dechering
@endsection

@section('content')
    {{-- Information section --}}
    <div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 my-4">
        <h2 class="my-5">{{ $project->title }} <a href="/admin/projects" class="btn btn-link float-right">Back to all Projects</a></h2>
        <p>{!! $project->information !!} </p>

        <!-- ALL IMAGES FOR THIS PROJECT -->
        <h2 class="my-5">Images</h2>
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

        <!--MAIN IMAGE FOR THIS PROJECT-->
        <h3 class="my-5">Main image</h3>
        <div class="row">
            <div class="col-4">
                @foreach($project->image as $image)
                    @if($image->main_image == 1)
                        <img src="/storage/images/{{ $image->title }}" class="img-fluid" alt="{{$image->title}}">
                    @endif
                @endforeach
            </div>
        </div>

        <!--EDIT BUTTON AND DELETE BUTTON-->
        <div class="my-5">
            <a href="/admin/projects/{{$project->id}}/edit" class="btn btn-primary">Edit {{$project->title}}</a>
            <form action="/admin/projects/{{$project->id}}" method="POST" class="float-right">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

@endsection
