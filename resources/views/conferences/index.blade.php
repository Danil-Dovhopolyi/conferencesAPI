<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Conference List</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/conferences') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <a class="navbar-brand" href="{{ route('conferences.create') }}">
                                Create
                            </a>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('auth.login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->firstname }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>

            </nav>
        </div>
    </header>
    <h1>List</h1>
    <div class="conferences">
        @foreach ($conferences as $conference)
            <div class="list-group conference m-2 d-flex">
                <div class="list-group-item list-group-item-action flex-column align-items-start w-80">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $conference->title }}</h5>
                        <p>{{ $conference->date }}</p>
                    </div>
                    <div class="conference__functionality d-flex justify-content-between m-3 ">
                        <a href="{{ route('conferences.update', $conference->id) }}" type="button"
                            class="btn btn-info w-25">
                            Info
                        </a>
                        <form action="{{ route('conferences.delete', $conference->id) }}" method="post"
                            class="w-25">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger w-100">Delete</button>
                        </form>
                        <a href="{{ route('conferences.edit', $conference->id) }}" type="button"
                            class="btn btn-warning w-25">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</body>

</html>
