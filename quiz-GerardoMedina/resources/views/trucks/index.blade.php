<!doctype html>
<html lang="en">

<head>
    <title>Trucks</title>
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
        @if (session('status') == 400)
        <div class="alert alert-warning">
            {{ session('message') }}
        </div>
        @elseif(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <div class="py-5" style="margin-left:-1px;">
            <h5 class="font-weight-bold">Escoja el camion</h5>
            <div class="text-right p-3">
                <a href="{{route('trucks.create')}}" class="btn btn-primary w-25"> Crear </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Support (kg)</th>
                        <th colspan="3" scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($trucks))
                        @foreach($trucks as $truck)
                        <tr>
                            <th scope="row">{{$truck->id}}</th>
                            <td>{{$truck->name}}</td>
                            <td>{{$truck->support_kg}} kg</td>
                            <td class="text-center"><a href="{{ route('trucks.purchase', $truck->id) }}" class="btn btn-success">Comprar con este camion</a></td>
                            <td class="text-center"><a href="{{ route('trucks.create', $truck->id) }}" class="btn btn-secondary">Editar</a></td>
                            <td class="text-center"><a href="{{ route('trucks.delete', $truck->id) }}" class="btn btn-danger">Borrar</a></td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>