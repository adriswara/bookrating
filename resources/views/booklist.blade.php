<!-- resources/views/my-page.blade.php -->
@extends('layouts.app')
@section('content')

    <h1>Book Rating Application</h1>
    <p>Booklist</p>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <form method="GET" action="{{ route('booklist') }}" class="mb-3">
            <div class="row">
                <div class="col-sm">
                    <select class="form-select" id="limitSelect" name="limit" required>
                        <option value="">List of Shown</option>
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i*10 }}" {{ request('limit') == $i*10 ? 'selected' : '' }}>{{ $i*10 }}</option>
                            @endfor
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <input type="text" class="form-control" name="search" id="searchInput" placeholder="Search by book name..." value="{{ request('search') }}">
                </div>
                <div class="col-sm">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>

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
@endsection