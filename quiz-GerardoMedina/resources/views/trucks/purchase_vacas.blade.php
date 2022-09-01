<!doctype html>
<html lang="en">

<head>
    <title>Data purchase</title>
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
   
    @if (session('status'))
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="py-5" style="margin-left:-1px;">
        <h5 class="font-weight-bold">The best option</h5>
        <div class="text-right mb-5 mr-3">
            <a href="{{route('trucks.index')}}" class="btn btn-secondary">Menu</a>
        </div>
        <table class="table">
            <ul class="list-group">
                @if(isset($truck))
                <li class="list-group-item active"><b>Truck Name: {{$truck->name}}</b></li>
                <li class="list-group-item">Support: {{$truck->support_kg}} kg</li>
                @endif
            </ul>
            <thead>
                <tr>
                    <th scope="col">#Cow</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Milk per day (L)</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($data))
                @foreach($data as $vaca)
                <tr>
                    <th scope="row">{{$vaca['id']}}</th>
                    <td scope="col">{{$vaca['weight_vaca']}}</td>
                    <td scope="col">{{$vaca['milk_per_vaca']}} L</td>
                </tr>
                @endforeach
                <tr>
                    <td scope="col">
                        <p>Total Kg: {{$total_kg}} kg</p>
                    </td>
                    <td scope="col" colspan="2">
                        <p>Total Liters of milk per day: {{$total_milk}} L</p>
                    </td>
                </tr>
                @endif

            </tbody>
        </table>
        @if(isset($truck))
        <div class="text-right mb-5 mr-3">
            <a href="{{route('trucks.buy', $truck->id)}}" class="btn btn-success">Buy</a>
        </div>
        @endif
    </div>
</body>

</html>