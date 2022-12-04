<!doctype html>
<html lang="en">

<head>
    <title>vacas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        @include('layouts.navbar')
        @if (session('status') == 'Dont have registers for buy')
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
        @elseif(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="py-5 ml-2">
            <h5 class="font-weight-bold mb-3">Vacas disponibles</h5>

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Liters per day of milk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vacas as $vaca)
                    <tr>
                        <th scope="row">{{$vaca->id}}</th>
                        <td>{{$vaca->weight}} kg</td>
                        <td>{{$vaca->milk_per_day}} L</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>