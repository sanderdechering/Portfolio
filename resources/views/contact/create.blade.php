@extends('layout')

@section('title', 'Contact Sander!')

@section('content')
    <div class="col-4 offset-4">
        <div class="row">
            <div class="col-12 my-5">
                <h2>Contact <a href="/" class="btn btn-link float-right">Back to homepage</a></h2>
            </div>
           <div class="col-12">
               <form action="/contact" method="POST">
                   <div class="form-group">
                       <label for="name">Name</label>
                       <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                       <div>{{ $errors->first('name') }}</div>
                   </div>
                   <div class="form-group">
                       <label for="email">Email</label>
                       <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                       <div>{{ $errors->first('email') }}</div>
                   </div>
                   <div class="form-group">
                       <label for="message">Message</label>
                       <textarea class="form-control" name="message" value="{{ old('message') }}" cols="30" rows="10"></textarea>
                       <div>{{ $errors->first('message') }}</div>
                   </div>
                   <button type="submit" class="btn btn-primary">Send the message</button>
                   @csrf
               </form>
           </div>
        </div>

    </div>
@endsection