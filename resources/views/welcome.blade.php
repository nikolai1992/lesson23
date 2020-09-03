<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{$car}}
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <td>{{$car->name}}</td>
                            <td>{{$car->description}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('cars.edit', $car->id)}}">Edit</a>
                                {{Form::open(['route'=>['cars.destroy', $car->id], 'method'=>'delete'])}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                {{Form::close()}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{--<form action="{{route('save.car')}}" method="post">--}}
                    {{--<input name="_token" value="{{csrf_token()}}" type="hidden">--}}
                    {{--<div class="row">--}}
                        {{--<label>Car name</label>--}}
                        {{--<input name="name" class="form-control">--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<label>Description</label>--}}
                        {{--<textarea class="form-control" name="description"></textarea>--}}
                    {{--</div>--}}
                    {{--<input type="submit" value="Save">--}}
                    {{--<div class="row"></div>--}}
                {{--</form>--}}
            </div>
        </div>
    </body>
</html>
