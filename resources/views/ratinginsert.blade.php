<!-- resources/views/my-page.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Book Rating Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>


</head>

<h1>Book Rating Application</h1>
<h2>Rating insert</h2>
<p>

<div class="container">

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

    <form action="" method="POST">


        <!-- Author Dropdown -->
        <div class="mb-3">
            <label for="idAuthor" class="form-label">Book Author</label>
            <select class="form-select" id="idAuthor" name="idAuthor" required>
                <option value="">Select an Author</option>
                @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Book Dropdown -->
        <div class="mb-3">
            <label for="book-dropdown" class="form-label">Book Name</label>
            <select class="form-select" id="book-dropdown" required>
                <option value="">Select a Book</option>
                <option value=""></option>
            </select>
        </div>

        <!-- Rating Dropdown -->
        <div class="mb-4">
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
</div>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#idAuthor').on('change', function() {
        var idAuthor = $(this).val();
        $('#book-dropdown').html('<option value="">Loading...</option>');
        if (idAuthor) {
            $.ajax({
                url: '/books/by-author/' + idAuthor,
                type: 'GET',
                success: function(data) {
                    var options = '<option value="">Select Book</option>';
                    $.each(data, function(key, book) {
                        options += '<option value="' + book.id + '">' + book.name + '</option>';
                    });
                    $('#book-dropdown').html(options);
                }
            });
        } else {
            $('#book-dropdown').html('<option value="">Select Book</option>');
        }
    });
</script>

</html>