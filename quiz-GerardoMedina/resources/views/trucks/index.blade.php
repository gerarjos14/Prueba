<!doctype html>
<html lang="en">

<head>
    <title>Trucks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    @if (session('status') == 'Dont have registers for buy')
    <div class="alert alert-warning">
        {{ session('status') }}
    </div>
    @elseif(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="py-5" style="margin-left:-1px;">
        <h5 class="font-weight-bold">Escoja el camion</h5>
        <div class="text-center mb-5 mr-3">
            <a href="{{route('purchases.index')}}" class="btn btn-secondary">Purchases</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Support (kg)</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trucks as $truck)
                <tr>
                    <th scope="row">{{$truck->id}}</th>
                    <td>{{$truck->name}}</td>
                    <td>{{$truck->support_kg}} kg</td>
                    <td><a href="{{ route('trucks.purchase', $truck->id) }}" class="btn btn-success">Comprar con este camion</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>