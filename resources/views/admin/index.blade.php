@extends('layout')

@section('title')
    Admin panel | Sander Dechering
@endsection

@section('content')
    <div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 my-4">
        <h2>Admin Panel <a href="{{ url('/logout') }}" class="btn btn-link float-right mb-5">Logout</a></h2>
        <a href="/admin/projects" class="btn btn-primary my-5">Projecten</a>
        <a href="/admin/images" class="btn btn-primary my-5">Images</a>
    </div>

@endsection
