<!-- resources/views/my-page.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row d-flex text-center mt-3">
        <h1>Book Rating App</h1>
    </div>
    <div class="row d flex text-center mt-3">
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