<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Conference List</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('conferences.create') }}">Create</a>
                    </li>
            </div>
            </div>
        </nav>
    </header>
    <h1>List</h1>
    <div class="conferences">
        @foreach ($conferences as $conference)
            <div class="list-group conference m-2 d-flex">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start w-80">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $conference->title }}</h5>
                        <p>{{ $conference->date }}</p>
                    </div>
                    <div class="conference__functionality d-flex justify-content-between m-3 ">
                        <button type="button" class="btn btn-info w-25">
                            Info
                        </button>
                        <button class="conference__btn btn btn-danger w-25 ">
                            Delete
                        </button>
                        <button type="button" class="btn btn-warning w-25">
                            Edit
                        </button>
                    </div>
                </a>
            </div>
        @endforeach


    </div>
</body>

</html>
