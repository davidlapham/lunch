<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>What's for lunch?</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" media="all" rel="stylesheet" type="text/css"/>

</head>
<body>
<div class="page-header">
    <h1>Team Lunch</h1>
    <h5>Next lunch is {{$next_monday}}</h5>
</div>
<div class="container">
    @if(!$monday)
        <div class="row" style="margin-bottom: 30px">
            <div class="col-md-9 box col-sm-12">
                <form method="POST" action="/vote">
                    {{ csrf_field() }}
                    <h3>Vote for next week's meal!</h3>

                    @foreach($restaurants as $restaurant)
                        <div class="radio">
                            <label>
                                <input type="radio" name="restaurant_id" id="optionsRadios1" value="{{$restaurant->id}}">
                                {{$restaurant->name}} ({{$restaurant->votes->count()}} votes)
                            </label>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label for="employeeId">Employee ID</label>
                        <input type="number" class="form-control" id="employee_id">
                    </div>
                    <input type="submit" class="btn btn-default navbar-btn company-red" value="Vote">
                </form>

            </div>
            <div class="col-md-3 col-sm-12">
                <h3>Today's Menu</h3>
                <p>We are having <b>{{$winner->name}}</b> for lunch! You'll enjoy a nice {{$winner->cuisine}} style
                    meal! Be sure to check out their
                    <a href="{{$winner->menu_url}}">menu</a>.</p>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12 box">
            <h4>Everyone's appetite</h4>
            <table class="table" style="width: 100%;">
                <tr>
                    <th>Restaurant</th>
                    <th>Cuisine</th>
                    <th>Menu</th>
                    <th>Date last used</th>
                </tr>

                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{$restaurant->name}}</td>
                        <td>{{$restaurant->cuisine}}</td>
                        <td><a href="{{$restaurant->menu}}">Menu</a></td>
                        <td>{{$restaurant->date_last_used}}</td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
</div
</body>
</html>
