@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row d-flex text-center mt-3">
        <h1>Insert Rating</h1>
    </div>

    <div class="row">
        <div class="col-sm">
            <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

    <form action="{{ route('ratinginsert.store') }}" method="POST">
        @csrf

        <!-- Author Dropdown -->
        <div class=" row my-3">
            <label for="idAuthor" class="form-label">Book Author</label>
            <select class="form-select" id="idAuthor" name="idAuthor" required>
                <option value="">Select an Author</option>
                @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Book Dropdown -->
        <div class="row mb-3">
            <label for="idBook" class="form-label">Book Name</label>
            <select class="form-select" id="idBook" name="idBook" required>
                <option value="">Select a Book</option>
                <option value=""></option>
            </select>
        </div>

        <!-- Rating Dropdown -->
        <div class="row mb-4">
            <label for="value" class="form-label">Drop Down</label>
            <select class="form-select" id="value" name="value" required>
                <option value="">Select Rating</option>
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit" class="btn btn-success">Submit Rating</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#idAuthor').on('change', function() {
        var idAuthor = $(this).val();
        $('#idBook').html('<option value="">Loading...</option>');
        if (idAuthor) {
            $.ajax({
                url: '/books/by-author/' + idAuthor,
                type: 'GET',
                success: function(data) {
                    var options = '<option value="">Select Book</option>';
                    $.each(data, function(key, book) {
                        options += '<option value="' + book.id + '">' + book.name + '</option>';
                    });
                    $('#idBook').html(options);
                }
            });
        } else {
            $('#idBook').html('<option value="">Select Book</option>');
        }
    });
</script>

@endsection