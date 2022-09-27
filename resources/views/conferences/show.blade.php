<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta class="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Conference Information</title>
    @vite(['resources/sass/show.scss'])
</head>

<body>
    <div class="wrapper ">
        <div class="content d-flex align-items-center justify-content-between ">
            <div class="meetinfo">
                <div class="meetinfo__text m-1">
                    <h1>Meet</h1>
                    <div class="meetinfo__title">
                        <div class="form-group  d-flex align-items-baseline gap-1">
                            <div class="text">
                                <p>Title: </p>
                            </div>
                            <div class="input">
                                <input readOnly class="form-control" value='{{ $conference->title }}' />
                            </div>
                        </div>
                    </div>
                    <div class="meetinfo__date">
                        <div class="form-group  d-flex align-items-baseline gap-1">
                            <div class="text">
                                <p> Date: </p>
                            </div>
                            <div class="input">
                                <input readOnly class="form-control" value='' />
                            </div>
                        </div>
                    </div>
                    <div class="meetinfo__country">
                        <div class="form-group d-flex align-items-baseline gap-1">
                            <div class="text">
                                <p> Country: </p>
                            </div>
                            <div class="input">
                                <input readOnly class="form-control" value='' />
                            </div>
                        </div>
                    </div>
                    <div class="meetinfo__longitude">
                        <div class="form-group d-flex align-items-baseline gap-1">
                            <div class="text">
                                <p>Logitude: </p>
                            </div>
                            <div class="input">
                                <input readOnly class="form-control" value='' />
                            </div>
                        </div>
                    </div>
                    <div class="meetinfo__latitude">
                        <div class="form-group d-flex align-items-baseline gap-1">
                            <div class="text">
                                <p> Latitude: </p>
                            </div>
                            <div class="input">
                                <input readOnly class="form-control" value='' />
                            </div>
                        </div>
                        <button class="meet__btn btn btn-danger w-25 ">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
