<!-- resources/views/my-page.blade.php -->
@extends('layouts.app')
@section('content')

<div class="container">

   <div class="row d-flex text-center mt-3">
        <h1>Author List</h1>
        <h2>10 Most Famous Author</h2>
    </div>

    <div class="row my-3">
        <div class="col-sm">
            <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Author Name</th>
                <th>Voter</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $author->author }}</td>
                <td>{{ $author->voter}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection