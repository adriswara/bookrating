<!-- resources/views/my-page.blade.php -->
@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row d-flex text-center mt-3">
        <h1>Lists Of books</h1>
    </div>
    <div class="row">
        <div class="col-sm">
            <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <div class="row m-3"></div>
    <form method="GET" action="{{ route('booklist') }}" class="mb-3">
        <div class="row">
            <div class="col-sm">
                <select class="form-select" id="limitSelect" name="limit" required>
                    <option value="">List of Shown</option>
                    @for($i = 1; $i <= 10; $i++)
                        <option value="{{ $i*10 }}" {{ request('limit') == $i*10 ? 'selected' : '' }}>Show {{ $i*10 }} Data</option>
                        @endfor
                </select>
            </div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
        </div>
        <div class="row m-2"></div>
        <div class="row">
            <div class="col-sm">
                <input type="text" class="form-control" name="search" id="searchInput" placeholder="Search by book name..." value="{{ request('search') }}">
            </div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
        </div>
        <div class="row m-2"></div>
        <div class="row">
            <div class="col-sm">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>
        <div class="row m-3"></div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->bookname }}</td>
                <td>{{ $book->categoryname }}</td>
                <td>{{ $book->authorname }}</td>
                <td>{{ $book->score }}</td>
                <td>{{ $book->voter }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection