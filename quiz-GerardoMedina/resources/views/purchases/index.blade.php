<!doctype html>
<html lang="en">

<head>
    <title>Purchases</title>
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
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="py-5" style="margin-left:-1px;">
        <h5 class="font-weight-bold">Purchases</h5>
        <div class="text-right mb-5 mr-3">
            <a href="{{route('trucks.index')}}" class="btn btn-secondary">Menu</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Support (kg)</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($purchases))
                <?php $count = 0; ?>
                @foreach($purchases->groupBy('truck_id') as $purchase)
                <tr>
                    <th scope="row">{{$count}}</th>
                    <td>{{$purchase[$count]->truck->name}}</td>
                    <td>{{$purchase[$count]->truck->support_kg}} kg</td>
                </tr>
                <?php $count++; ?>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>