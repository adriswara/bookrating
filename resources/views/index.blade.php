<!-- resources/views/my-page.blade.php -->
@extends('layouts.app')
@section('content')
    <h1>Book Rating Application</h1>
    <p>This is a new page created in Laravel.</p>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a href="{{ route('booklist') }}" class="btn btn-primary">Book list</a>
            </div>
            <div class="col-sm">
                <a href="{{ route('authorlist') }}" class="btn btn-primary">10 Most Famous Author List</a>
            </div>
            <div class="col-sm">
                <a href="{{ route('ratinginsert') }}" class="btn btn-primary">Insert Rating</a>
            </div>
        </div>
    </div>
@endsection