<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta class="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Conference Information</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="create__conf ">
        <form class="create__conf__form d-flex mt-5 flex-column"
            action="{{ route('conferences.update', $conference->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group create__conf__form-title">
                <input type="text" name="title" class="form-control" placeholder="Enter title"
                    value="{{ $conference->title }}" />
            </div>
            <div class="create__conf__form-date d-flex m-0 ">

                <input type="date" id="start" name="date" value="{{ $conference->date }}">
                <div class="create__conf__coords d-flex align-items-center">
                    <input type="number" name="latitude" class="form-control m-1" placeholder="latitude"
                        value="{{ $conference->latitude }}" />
                    <input type="number" name="longitude" class="form-control" placeholder="longitude"
                        value="{{ $conference->longitude }}" />
                </div>
            </div>
            <div class="form-group create__conf__form-conutry">
                <label for="exampleFormControlSelect">Country</label>
                <select class="form-select" name="country">
                    <option selected>{{ $conference->country }}</option>
                    <option name="Ukraine" value='Ukraine'>Ukraine</option>
                    <option name="USA" value="USA">USA</option>
                    <option name="Poland" value="Poland">Poland</option>
                </select>
            </div>
            <div class="create__conf__form-btns d-flex justify-content-between">
                <div class="create__conf__form-unsubmit">
                    <a href='/conference' type="button" class="btn btn-danger">
                        Back
                    </a>
                </div>
                <div class="create__conf__form-submit">
                    <button type="submit" class="btn btn-success">
                        Edit
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
