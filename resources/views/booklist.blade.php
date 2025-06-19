<!-- resources/views/my-page.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Book Rating Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>


</head>

<body>
    <h1>Book Rating Application</h1>
    <p>Booklist</p>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-sm">
                <button type="button" class="btn btn-primary">Container 2</button>
            </div>
            <div class="col-sm">
                <button type="button" class="btn btn-primary">Container 3</button>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>



</body>

</html>