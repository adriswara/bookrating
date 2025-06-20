<!-- resources/views/my-page.blade.php -->
@extends('layouts.app')
@section('content')

    <h1>Book Rating Application</h1>
    <p>Authorlist</p>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-sm">
                <!-- <button type="button" class="btn btn-primary">Container 2</button> -->
            </div>
            <div class="col-sm">
                <!-- <button type="button" class="btn btn-primary">Container 3</button> -->
            </div>
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
@endsection