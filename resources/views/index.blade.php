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
    <p>This is a new page created in Laravel.</p>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a href="{{ route('booklist') }}" class="btn btn-primary">Book list</a>
            </div>
            <div class="col-sm">
                <a href="{{ route('authorlist') }}" class="btn btn-primary">10 Most Famouse Author List</a>
            </div>
            <div class="col-sm">
                <button type="button" class="btn btn-primary">Insert Rating</button>
            </div>
        </div>
    </div>


</body>

</html>